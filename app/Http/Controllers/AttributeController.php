<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::with('attribute_values')->paginate(10);
        // dd($attributes);
        return view('dashboard.attributes.index', compact('attributes'));
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
        return view('dashboard.attributes.create', compact('categories', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Attribute::create($request->all());
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 1,
            'table'  => ' Атрибуты',
            'description' => 'Название: ' . $request->name
        ]);
        return redirect(route('attributes.index'))->with('success', 'Аттрибут успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        return view('dashboard.attributes.show', compact('attribute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)

    {
        $categories = Category::get();
        return view('dashboard.attributes.edit', compact('attribute', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        $attribute->update($request->all());
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 2,
            'table'  => ' Атрибуты',
            'description' => 'Название: ' . $request->name
        ]);
        return redirect(route('attributes.index'))->with('success', 'Аттрибут успешно изменена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 3,
            'table'  => ' Атрибуты',
            'description' => 'Название: ' . $attribute->name
        ]);
        $attribute->delete();
        return redirect(route('attributes.index'))->with('success', 'Аттрибут успешно удалена!');
    }
}
