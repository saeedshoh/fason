<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class CategoryController extends Controller
{
    public function __construct()
	{
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);

        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('subcategories')->get();
        return view('dashboard.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Category $category, CategoryRequest $request)
    {   

        $request->validate([
			'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		$icon = $request->file('icon')->store('/img/' . now()->year . '/' . sprintf("%02d", now()->month));
        
		Category::create($request->validated() + ['icon' => $icon]);
        return redirect(route('categories.index'))->with('success', 'Категория успешно добавлена!');
    }

    // public function store(Request $request, Category $category)
    // {
    //     $request->validate([
    //         'name' => 'required|min:3',
    //         'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    //     ]);

    //     $category = Category::create($request->all());

    //     if(!is_null($category)) {
    //             return response()->json(["status" => "success", "message" => "Категория успешно добавлена!", "data" => $category]);
    //     } else {
    //         return response()->json(["status" => "failed", "message" => "Введите коректные данные, категория не добавлена!"]);
    //     }
    // }

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
        $categories = Category::with('subcategories')->get();
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
        $request->validate([
            'icon' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048'
        ]);
        $icon = $request->file('image')->store('/img/' . now()->year . '/' . sprintf("%02d", now()->month));
        
        $category->update($request->validated() + ['image' => $icon]);
        // return redirect(route('categories.index'))->with('success', 'Категория успешно обновлена!');
        return dd($category);
    }

    // public function update(Request $request)
    // {
    //     $category_id = $request->id;
    //     $category = Category::where("id", $category_id)->update($request->all());

    //     if($category == 1) {
    //         return response()->json(["status" => "success", "message" => "Категория успешно обновлена!"]);
    //     } else {
    //         return response()->json(["status" => "failed", "message" => "Введите коректные данные!"]);
    //     }
    // }

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

    // public function destroy($category_id) {
    //     $category = Category::where("id", $category_id)->delete();
    //     if($category == 1) {
    //         return response()->json(["status" => "success", "message" => "Success! post deleted"]);
    //     } else {
    //         return response()->json(["status" => "failed", "message" => "Alert! post not deleted"]);
    //     }
    // }

}
