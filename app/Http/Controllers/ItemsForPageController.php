<?php

namespace App\Http\Controllers;

use App\Models\ItemsForPage;
use Illuminate\Http\Request;

class ItemsForPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemsForPage  $itemsForPage
     * @return \Illuminate\Http\Response
     */
    public function show(ItemsForPage $itemsForPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemsForPage  $itemsForPage
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemsForPage $itemsForPage)
    {
        return view('dashboard.itemsForPage', compact('itemsForPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemsForPage  $itemsForPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemsForPage $itemsForPage)
    {
        $request->validate([
            'qty' => 'required|numeric'
        ]);
        $itemsForPage->update(['qty' => $request->qty, 'timestamps' => false]);
        return redirect()->route('editItemsForPage', 1)->with('success', 'Количество товаров на главной странице успешно изменена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemsForPage  $itemsForPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemsForPage $itemsForPage)
    {
        //
    }
}
