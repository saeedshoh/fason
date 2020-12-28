<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guest($slug) {
        $store = Store::where('slug', $slug)->first();
        $products = Product::where('store_id', $store->id)->get();
        return view('store.guest', compact('store', 'products'));
    }
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
    public function store(StoreRequest $request)
    {
        $request->validate([
			'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,Webp',
			'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,Webp'
        ]);
        
		$avatar = $request->file('avatar')->store(now()->year . '/' . sprintf("%02d", now()->month));
        $cover = $request->file('cover')->store(now()->year . '/' . sprintf("%02d", now()->month));

        Store::create($request->validated() + ['avatar' => $avatar, 'cover' => $cover, 'user_id' => Auth::id() ]);

        return redirect()->route('home')->with('success', 'Магазин успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $stores = Store::where('slug', $slug)->first();
        $products = Product::where('store_id', $stores->id)->get();

        return view('store.show', compact('stores', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
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
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->delete();
        return redirect(route('store.index'))->with('success', 'Магазин успешно удалена!');
    }
}
