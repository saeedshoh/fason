<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Banners;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
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
    public function category($slug) {
        $cat_id =  Category::where('slug', $slug)->first()->id;
        $categories = Category::where('parent_id', $cat_id)->get();
        $categoryIds = Category::where('parent_id', $parentId = Category::where('id', $cat_id)
                ->value('id'))
                ->pluck('id')
                ->push($parentId)
                ->all();
        $has = Category::with('grandchildren')->find($cat_id);
        if(isset($has->grandchildren[0])){
            foreach($has->grandchildren[0]->childrens as $child)
            {
                array_push($categoryIds, $child->id);
            }
        }
        $products = Product::whereIn('category_id', $categoryIds)->where('product_status_id', 2)->get();
        $sliders = $this->banners->where('type', 1);
        return view('category', compact('categories', 'products', 'sliders'));
    }

    public function subcategories(Request $request){
        $name = Category::find($request->category)->name;
        $categories = Category::where('parent_id', $request->category)->get();
        return view('categoryChild', compact('categories', 'name'))->render();
    }

    public function categoryProducts(Request $request){
        $products = Product::where('category_id', $request->category)->where('product_status_id', 2)->get();
        return view('categoryProducts', compact('products'))->render();
    }

    public function countProducts(Request $request){
        $categoryIds = Category::where('parent_id', $parentId = Category::where('id', $request->category)
                ->value('id'))
                ->pluck('id')
                ->push($parentId)
                ->all();
        $has = Category::with('grandchildren')->find($request->category);
        if(isset($has->grandchildren[0])){
            foreach($has->grandchildren[0]->childrens as $child)
            {
                array_push($categoryIds, $child->id);
            }
        }
        $count = Product::whereIn('category_id', $categoryIds)->where('product_status_id', 2)->get('id');
        return response()->json(count($count));
    }

    public function index()
    {
        $categories = Category::where('parent_id', '0')->paginate(10);

        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('dashboard.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $request->validate([
			'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		$icon = $request->file('icon')->store(now()->year . '/' . sprintf("%02d", now()->month));
		Category::create($request->validated() + ['icon' => $icon]);
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
        $categories = Category::where('parent_id', 0)->get();
        return view('dashboard.category.edit', compact('categories', 'category'));
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
        if ($request->icon != $category->image) {
            $request->validate([
                'icon' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048'
            ]);
            if ($request->icon != $category->image) {
                if(Storage::exists($category->icon))
                Storage::delete($category->icon);
                $icon = $request->file('icon')->store(now()->year . '/' . sprintf("%02d", now()->month));
            }
            $category->update([
                'icon' => $icon,
            ]);
        }
        $category->update($request->validated());
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
        if($id->parent_id != 0){
            $parent = Category::where('id', $id->parent_id)->first();
            if($parent->parent_id){
                $grandParent = Category::where('id', $parent->parent_id)->first();
                return $grandParent;
            }
            return 'parent';
        }
        else{
            return 'ndora';
        }
    }

}
