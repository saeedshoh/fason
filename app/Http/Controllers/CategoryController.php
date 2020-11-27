<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
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
    public function store(CategoryRequest $request)
    {   

        $request->validate([
			'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		$icon = $request->file('icon')->store('/img/' . now()->year . '/' . sprintf("%02d", now()->month));
        
		Category::create($request->validated() + ['icon' => $icon]);
        return redirect(route('categories.index'))->with('success', 'Категория успешно добавлена!');
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
        if ($request->icon != $category->image) {
            if(Storage::exists($category->icon))
            Storage::delete($category->icon);
            $icon = $request->file('icon')->store('/img/' . now()->year . '/' . sprintf("%02d", now()->month));
        }
        $category->update($request->validated() + ['icon' => $icon]);
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

}
