<?php

namespace App\Http\Controllers;

use App\Models\store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::latest()->paginate(20);
        return view('dashboard.store.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
			'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
			'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
		]);

		$image = $request->file('avatar')->store(now()->year . '/' . sprintf("%02d", now()->month));
        $cover = $request->file('cover')->store(now()->year . '/' . sprintf("%02d", now()->month));

        Store::create($request->validate() + ['avatar' => $image, 'cover' => $cover]);

        return redirect(route('store.store'))->with('success', 'Магазин успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(store $store)
    {
        return view('store.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(store $store)
    {
        return view('store.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(store $store)
    {
        $store->delete();
        return redirect(route('store.index'))->with('success', 'Магазин успешно удалена!');
    }
}
