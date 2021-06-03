<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\ItemsForPage;
use Illuminate\Http\Request;

class ItemsForPageController extends Controller
{
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
        Log::create([
            'user_id' => auth()->user()->id,
            'action' => 1,
            'table'  => 'Кол-во товаров на Главной странице',
            'description' => 'Колмчество товаров на Главной странице было изменено на: ' . $request->qty
        ]);
        return redirect()->route('editItemsForPage', 1)->with('success', 'Количество товаров на главной странице успешно изменена!');
    }
}
