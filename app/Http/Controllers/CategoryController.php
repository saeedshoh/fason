<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilters;
use App\Http\Requests\CategoryRequest;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\City;
use App\Models\Log;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $cat_id = Category::where('slug', $slug)->first()->id;
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
                'next_page' => $products->nextPageUrl(),
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
        // $allCategories = Category::where('name', 'like', '%' . $request->search . '%')->get();
        // $categories = Category::where('parent_id', 0)
        //     ->orderBy('order_no')
        //     ->paginate(30)
        //     ->withQueryString();
        $allCategories = Category::where('name', 'like', '%' . $request->search . '%')->get();
        $categories = Category::orderBy('order_no')->paginate(30)->withQueryString();
        if ($request->ajax()) {
            if ($request->search != '') {
                // $categories = Category::where('parent_id', 0)
                //     ->where('name', 'like', '%' . $request->search . '%')
                //     ->orWhereHas('childrens', function ($children) use ($request) {
                //         $children->where('name', 'like', '%' . $request->search . '%')->orderBy('order_no');
                //     })
                //     ->orWhereHas('grandchildren', function ($grandchildren) use ($request) {
                //         $grandchildren->where('name', 'like', '%' . $request->search . '%')->orderBy('order_no');
                //     })
                //     ->orderBy('order_no')
                //     ->paginate(30)
                //     ->withQueryString();
                $categories = Category::where('name', 'like', '%' . $request->search . '%')
                    ->orderBy('order_no')
                    ->paginate(30)
                    ->withQueryString();
            } else {
                // $categories = Category::where('parent_id', 0)
                //     ->orderBy('order_no')
                //     ->paginate(30)
                //     ->withQueryString();
                $categories = Category::orderBy('order_no')
                    ->paginate(30)
                    ->withQueryString();
            }
            return response()->json(
                view(
                    'dashboard.ajax.categories',
                    compact('categories', 'allCategories')
                )->render()
            );
        }
        return view('dashboard.category.index', compact('categories', 'allCategories'));
    }

    public function inactive(Request $request)
    {
        $allCategories = Category::where('name', 'like', '%' . $request->search . '%')->get();
        $categories = Category::where('is_active', 0)->orderBy('order_no')->paginate(30)->withQueryString();
        if ($request->ajax()) {
            if ($request->search != '') {
                $categories = Category::where('name', 'like', '%' . $request->search . '%')->where('is_active', 0)->orderBy('order_no')->paginate(30)->withQueryString();
            } else {
                $categories = Category::orderBy('order_no')->where('is_active', 0)->paginate(30)->withQueryString();
            }
            return response()->json(
                view(
                    'dashboard.ajax.inactive',
                    compact('categories', 'allCategories')
                )->render()
            );
        }
        return view('dashboard.category.inactive', compact('categories', 'allCategories'));
    }

    public function active(Request $request)
    {
        $allCategories = Category::where('name', 'like', '%' . $request->search . '%')->get();
        $categories = Category::where('is_active', 1)->orderBy('order_no')->paginate(30)->withQueryString();
        if ($request->ajax()) {
            if ($request->search != '') {
                $categories = Category::where('name', 'like', '%' . $request->search . '%')->where('is_active', 1)->orderBy('order_no')->paginate(30)->withQueryString();
            } else {
                $categories = Category::orderBy('order_no')->where('is_active', 1)->paginate(30)->withQueryString();
            }
            return response()->json(
                view(
                    'dashboard.ajax.inactive',
                    compact('categories', 'allCategories')
                )->render()
            );
        }
        return view('dashboard.category.active', compact('categories', 'allCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', 0)->where('is_active', 1)->with('childrens', function($children){
            $children->where('is_active', 1);
        })->get();
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
        $parent_cat = $request->parent_id != 0 ? Category::where('id', $request->parent_id)->first()->name : 'Родительская';
        if ($request->attribute) {
            for ($i = 0; $i < count($request->attribute); $i++) {
                $attributes = $attributes . Attribute::where('id', $request->attribute[$i])->first()->name . ', ';
            }
        }
        if ($request->file('icon')) {

            $request->validate([
                'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'table' => 'Категории',
            'description' => 'Название: ' . $request->name . ', Родителькая категория: ' . $parent_cat . ', Атрибуты: ' . $attributes . ', Активность: ' . $isActive,
        ]);

        return redirect()->route('categories.index')->with( ['class' => 'success', 'message' => 'Категория  «'.$category->name.'»  успешно добавлен!']);

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
        $previous = url()->previous();
        $attributes = Attribute::get();
        $categories = Category::where('parent_id', 0)->with('childrens')->get();
        return view('dashboard.category.edit', compact('categories', 'category', 'attributes', 'previous'));
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
        if (strrpos($request->previous, '?')) {
            substr($request->previous, strrpos($request->previous, '?'));
        }
        $isActive = $request->is_active == 1 ? 'Активен' : 'Неактивен';
        $attributes = '';
        $parent_cat = $request->parent_id != 0 ? Category::where('id', $request->parent_id)->first()->name : 'Родительская';

        if ($request->attribute != 0 && $request->attribute && $request->attribute[0] > 0) {
            for ($i = 0; $i < count($request->attribute); $i++) {
                $attributes = $attributes . Attribute::where('id', $request->attribute[$i])->first()->name . ', ';
            }
        }
        if ($request->icon != $category->image) {
            $request->validate([
                'icon' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
            ]);
            if ($request->icon != $category->image) {
                if (Storage::exists($category->icon)) {
                    Storage::delete($category->icon);
                }

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
            $attributes->whereIn('attribute_id', $category->attributes->pluck('id'));
        })->exists()) {
            return back()->with(['class' => 'warning', 'message' => 'Невозможно обновить категорию, поскольку существуют товары с такими атрибутами.']);
        } else {
            if ($request->attribute != 0) {
                $category->attributes()->sync($request->attribute);
            }

            $class = 'primary';
            $message = 'Категория «'.$category->name.'»  успешно обновлена!';

            //IF category is parent OR category is not parent AND its parent is active, update category and toggle is_active column of children categories
            if($category->isParent() || (!$category->isParent() && $category->parent->is_active === 1)){
                $category->update($request->validated());
                $category->toggleIsActive($category, $request->is_active);
            } else {
                $category->update($request->except('is_active'));
                $class = 'warning';
                $message = 'Категория  «'.$category->name.'»  успешно обновлена, НО не активирована, поскольку ее родительская категория неактивна.';
            }

            Log::create([
                'user_id' => Auth::user()->id,
                'action' => 2,
                'table' => 'Категории',
                'description' => 'Название: ' . $request->name . ', Родителькая категория: ' . $parent_cat . ', Атрибуты: ' . $attributes . ', Активность: ' . $isActive,
            ]);
            return redirect(url($request->previous))->with(['class' => $class, 'message' => $message]);
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
        $class = 'danger';
        $message = 'Категория  «'.$category->name.'»  успешно удалена!';
        $isActive = $category->is_active == 1 ? 'Активен' : 'Неактивен';
        $attributes = '';
        $parent_cat = $category->parent_id != 0 ? Category::where('id', $category->parent_id)->first()->name : 'Родительская';
        if ($category->attribute != null) {
            for ($i = 0; $i < count($category->attribute); $i++) {
                $attributes = $attributes . Attribute::where('id', $category->attribute[$i])->first()->name . ', ';
            }
        }
        if ($category->products_no_scope->isEmpty() and $this->getChildrenProducts($category) == 0 and $this->getGrandChildrenProducts($category) == 0 and $category->is_monetized == 0) {
            Log::create([
                'user_id' => Auth::user()->id,
                'action' => 3,
                'table' => 'Категории',
                'description' => 'Название: ' . $category->name . ', Родителькая категория: ' . $parent_cat . ', Атрибуты: ' . $attributes . ', Активность: ' . $isActive,
            ]);
            $category->delete();
        } else {
            if ($category->is_monetized) {
                $class = 'warning';
                $message = 'Невозможно удалить категорию, так как установлен монетизация на этом категории.';
            } else {
                $class = 'warning';
                $message = 'Невозможно удалить категорию, так как есть товар с такой категорией.';
            }
        }

        return redirect()->back()->with(['class' => $class, 'message' => $message]);
    }

    public function getSubCategories(Request $request)
    {
        $subcategories = Category::where('parent_id', $request->category)
            ->where('is_active', 1)
            ->orderBy('order_no')
            ->get();
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
                $user->where('name', 'like', '%' . $request->search . '%');
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
            'order_no' => $sibling->order_no,
        ]);
        $sibling->update([
            'order_no' => $tempCategory,
        ]);
        return true;
    }

    private function getChildrenProducts(Category $category)
    {
        $ids = $category->childrens->pluck('id')->toArray();
        return DB::table('products')->whereIn('category_id', $ids)->count();
    }

    private function getGrandChildrenProducts(Category $category)
    {
        $ids = $category->grandchildren->pluck('id')->toArray();
        $categories = DB::table('categories')->wherein('parent_id', $ids)->pluck('id')->toArray();
        return DB::table('products')->whereIn('category_id', $categories)->count();
    }
}
