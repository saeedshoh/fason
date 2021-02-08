<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Banners;
use App\Models\Category;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Log;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->banners = Banners::latest()->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category(Request $request, $slug)
    {
        $cat_id =  Category::where('slug', $slug)->first()->id;
        $name = Category::where('slug', $slug)->first();
        $categories = Category::where('parent_id', $cat_id)->get();
        $categoryIds = Category::where('parent_id', $parentId = Category::where('id', $cat_id)
            ->value('id'))
            ->pluck('id')
            ->push($parentId)
            ->all();
        $has = Category::with('grandchildren')->find($cat_id);
        if (isset($has->grandchildren[0])) {
            foreach ($has->grandchildren[0]->childrens as $child) {
                array_push($categoryIds, $child->id);
            }
        }
        $parent_cat = Category::where('parent_id', $name->parent_id)->get();

        $productss = Product::whereIn('category_id', $categoryIds)->where('product_status_id', 2);
        $sliders = $this->banners->where('type', 1);

        if ($request->sort == 'new') {
            $productss->orderByDesc('id');
        } elseif ($request->sort == 'cheap') {
            $productss->orderBy('price');
        } elseif ($request->sort == 'expensive') {
            $productss->orderByDesc('price');
        }
        if ($request->priceFrom) {
            $productss->where('price', '>=', $request->priceFrom);
        }
        if ($request->priceTo) {
            $productss->where('price', '<=', $request->priceTo);
        }
        if ($request->city) {
            $store = Store::where('city_id', $request->city)->get();
            $productss->whereIn('store_id', $store->pluck('id'));
        }
        $products = $productss->inRandomOrder()->paginate(2);

        if ($request->ajax()) {
            $style = $request->style;
            return [
                'posts' => view('ajax.category', compact('products', 'style'))->render(),
                'next_page' => $products->nextPageUrl()
            ];
        }
        return view('category', compact('categories', 'products', 'sliders', 'name', 'cat_id', 'parent_cat'));
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
            foreach ($has->grandchildren[0]->childrens as $child) {
                array_push($categoryIds, $child->id);
            }
        }
        $count = Product::whereIn('category_id', $categoryIds)->where('product_status_id', 2)->get('id');
        return response()->json(count($count));
    }

    public function index()
    {
        $categories = Category::paginate(10);

        return view('dashboard.category.index', compact('categories'));
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
    public function store(Request $request)
    {
        $isActive = $request->is_active == 1 ? 'Активен' : 'Неактивен';
        $attributes = '';
        $parent_cat = $request->parent_id != 0  ? Category::where('id', $request->parent_id)->first()->name : 'Родительская';
        if ($request->attribute[0] > 0) {
            for ($i = 0; $i < count($request->attribute); $i++) {
                $attributes =  $attributes . Attribute::where('id', $request->attribute[$i])->first()->name . ', ';
            }
        }
        if ($request->icon) {

            $request->validate([
                'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $icon = $request->file('icon')->store(now()->year . '/' . sprintf("%02d", now()->month));
            $category = Category::create($request->all() + ['icon' => $icon]);
        } else {
            $category = Category::create($request->all());
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
        $categories = Category::where('parent_id', 0)->get();
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
        // return $request;
        $isActive = $request->is_active == 1 ? 'Активен' : 'Неактивен';
        $attributes = '';
        $parent_cat = $request->parent_id != 0  ? Category::where('id', $request->parent_id)->first()->name : 'Родительская';
        if ($request->attribute && $request->attribute[0] > 0) {
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
        $category->attributes()->detach();
        $category->attributes()->attach($request->attribute);
        $category->update($request->validated());

        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 2,
            'table'  => 'Категории',
            'description' => 'Название: ' . $request->name . ', Родителькая категория: ' . $parent_cat . ', Атрибуты: ' . $attributes . ', Активность: ' . $isActive
        ]);
        return redirect(route('categories.index'))->with('success', 'Категория успешно обновлена!');
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
        // return $id;
        // $hasParent = Category::where('id', $request->category)->first();
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

    public function logsIndex()
    {
        $count = Log::count();
        $logs = Log::orderBy('id', 'desc')->paginate(50);
        return view('dashboard.logs.index', compact('logs', 'count'));
    }
}
