<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\City;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Filters\ProductFilters;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-categories', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-categories', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-categories', ['only' => ['destroy']]);
        $this->middleware('permission:read-categories', ['only' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category(Request $request, $slug, ProductFilters $filters)
    {
        $cat_id =  Category::where('slug', $slug)->first()->id;
        $name = Category::where('slug', $slug)->first();
        $categories = Category::where('parent_id', $cat_id)->orderBy('order_no')->get();
        $categoryIds = Category::where('parent_id', $parentId = Category::where('id', $cat_id)
            ->value('id'))
            ->pluck('id')
            ->push($parentId)
            ->all();
        $has = Category::with('grandchildren')->find($cat_id);
        if (isset($has->grandchildren[0])) {
            for ($i = 0; $i < count($has->grandchildren); $i++) {
                foreach ($has->grandchildren[$i]->childrens as $child) {
                    array_push($categoryIds, $child->id);
                }
            }
        }
        $parent_cat = Category::where('parent_id', $name->parent_id)->orderBy('order_no')->get();
        $products = Product::whereIn('category_id', $categoryIds)->where('product_status_id', 2)->filter($filters)->paginate(12)->withQueryString();
        $cities = City::whereHas('stores', function ($stores) {
            $stores->withoutGlobalScopes()->whereHas('product', function ($products) {
                $products->withoutGlobalScopes();
            });
        })->get();

        if ($request->ajax()) {
            $style = $request->style;
            return [
                'posts' => view('ajax.category', compact('products', 'style'))->render(),
                'next_page' => $products->nextPageUrl()
            ];
        }
        return view('category', compact('categories', 'products', 'name', 'cat_id', 'parent_cat', 'cities', 'slug'));
    }

    public function subcategories(Request $request)
    {
        $name = Category::find($request->category)->name;
        $categories = Category::where('parent_id', $request->category)->get();
        return view('categoryChild', compact('categories', 'name'))->render();
    }

    public function categoryProducts(Request $request)
    {
        $products = Product::where('category_id', $request->category)->where('product_status_id', 2)->get();
        return view('categoryProducts', compact('products'))->render();
    }

    public function countProducts(Request $request)
    {
        $categoryIds = Category::where('parent_id', $parentId = Category::where('id', $request->category)
            ->value('id'))
            ->pluck('id')
            ->push($parentId)
            ->all();
        $has = Category::with('grandchildren')->find($request->category);
        if (isset($has->grandchildren[0])) {
            for ($i = 0; $i < count($has->grandchildren); $i++) {
                foreach ($has->grandchildren[$i]->childrens as $child) {
                    array_push($categoryIds, $child->id);
                }
            }
        }
        $count = Product::whereIn('category_id', $categoryIds)->where('product_status_id', 2)->count();
        return response()->json($count);
    }

    public function index(Request $request)
    {
        $allCategories = Category::where('name', 'like', '%' . $request->search . '%')->get();
        $categories = Category::where('name', 'like', '%' . $request->search . '%')
            ->orderBy('order_no')
            ->paginate(30)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.categories',
                    compact('categories', 'allCategories')
                )->render()
            );
        }
        return view('dashboard.category.index', compact('categories', 'allCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $attributes = Attribute::get();
        return view('dashboard.category.create', compact('categories', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $isActive = $request->is_active == 1 ? 'Активен' : 'Неактивен';
        $attributes = '';
        $parent_cat = $request->parent_id != 0  ? Category::where('id', $request->parent_id)->first()->name : 'Родительская';
        if ($request->attribute) {
            for ($i = 0; $i < count($request->attribute); $i++) {
                $attributes =  $attributes . Attribute::where('id', $request->attribute[$i])->first()->name . ', ';
            }
        }
        if ($request->file('icon')) {

            $request->validate([
                'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $icon = $request->file('icon')->store(now()->year . '/' . sprintf("%02d", now()->month));
            $category = Category::create($request->validated() + ['icon' => $icon]);
        } else {
            $category = Category::create($request->validated());
        }
        $category->attributes()->attach($request->attribute);
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 1,
            'table'  => 'Категории',
            'description' => 'Название: ' . $request->name . ', Родителькая категория: ' . $parent_cat . ', Атрибуты: ' . $attributes . ', Активность: ' . $isActive
        ]);

        return redirect()->route('categories.index')->with('success', 'Категория успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('dashboard.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $attributes = Attribute::get();
        $categories = Category::get();
        return view('dashboard.category.edit', compact('categories', 'category', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $page = '';
        if(strrpos($request->previous,'?')){
            $page = substr($request->previous, strrpos($request->previous,'?'));
        }
        $isActive = $request->is_active == 1 ? 'Активен' : 'Неактивен';
        $attributes = '';
        $parent_cat = $request->parent_id != 0  ? Category::where('id', $request->parent_id)->first()->name : 'Родительская';

        if ($request->attribute != 0 && $request->attribute && $request->attribute[0] > 0) {
            for ($i = 0; $i < count($request->attribute); $i++) {
                $attributes =  $attributes . Attribute::where('id', $request->attribute[$i])->first()->name . ', ';
            }
        }
        if ($request->icon != $category->image) {
            $request->validate([
                'icon' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048'
            ]);
            if ($request->icon != $category->image) {
                if (Storage::exists($category->icon))
                    Storage::delete($category->icon);
                $icon = $request->file('icon')->store(now()->year . '/' . sprintf("%02d", now()->month));
            }
            $category->update([
                'icon' => $icon,
            ]);
        }
        $attr = [];
        foreach ($category->attributes as $attribute) {
            array_push($attr, $attribute->id);
        }
        if ($attr != $request->attribute && Product::withoutGlobalScopes()->where('category_id', $category->id)->whereHas('attribute_variation', function ($attributes) use ($category) {
            $attributes->whereIn('attribute_id', $category->attributes);
        })->exists()) {
            return back()->with(['class' => 'danger', 'message' => 'Невозможно обновить категорию, поскольку существуют товары с такими атрибутами.']);
        } else {
            if ($request->attribute != 0) {
                $category->attributes()->sync($request->attribute);
            }
            $category->update($request->validated());

            Log::create([
                'user_id' => Auth::user()->id,
                'action' => 2,
                'table'  => 'Категории',
                'description' => 'Название: ' . $request->name . ', Родителькая категория: ' . $parent_cat . ', Атрибуты: ' . $attributes . ', Активность: ' . $isActive
            ]);
            return redirect(route('categories.index').$page)->with('success', 'Категория успешно обновлена!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $isActive = $category->is_active == 1 ? 'Активен' : 'Неактивен';
        $attributes = '';
        $parent_cat = $category->parent_id != 0  ? Category::where('id', $category->parent_id)->first()->name : 'Родительская';
        if ($category->attribute != null) {
            for ($i = 0; $i < count($category->attribute); $i++) {
                $attributes =  $attributes . Attribute::where('id', $category->attribute[$i])->first()->name . ', ';
            }
        }
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 3,
            'table'  => 'Категории',
            'description' => 'Название: ' . $category->name . ', Родителькая категория: ' . $parent_cat . ', Атрибуты: ' . $attributes . ', Активность: ' . $isActive
        ]);
        $category->delete();
        return redirect(route('categories.index'))->with('success', 'Категория успешно удалена!');
    }

    public function getSubCategories(Request $request)
    {
        $subcategories = Category::where('parent_id', $request->category)->where('is_active', 1)->get();
        return $subcategories;
    }

    public function getParentCategories(Request $request)
    {
        $id = Category::where('id', $request->category)->first();
        if ($id->parent_id != 0) {
            $parent = Category::where('id', $id->parent_id)->first();
            if ($parent->parent_id) {
                $grandParent = Category::where('id', $parent->parent_id)->first();
                return $grandParent;
            }
            return 'parent';
        } else {
            return 'ndora';
        }
    }

    public function logsIndex(Request $request)
    {
        $logs = Log::latest('id')
            ->where('table', 'like', '%' . $request->search . '%')
            ->orWhere('description', 'like', '%' . $request->search . '%')
            ->orWhereHas('user', function ($user) use ($request) {
                $user->where('name',  'like', '%' . $request->search . '%');
            })
            ->paginate(50)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.logs',
                    compact('logs')
                )->render()
            );
        }
        return view('dashboard.logs.index', compact('logs'));
    }

    public function changeCategoryOrder(Request $request)
    {
        $category = Category::where('id', $request->category)->first();
        $tempCategory = $category->order_no;
        $sibling = Category::where('order_no', $request->sibling)->first();
        $category->update([
            'order_no' => $sibling->order_no
        ]);
        $sibling->update([
            'order_no' => $tempCategory
        ]);
        return true;
    }
}
