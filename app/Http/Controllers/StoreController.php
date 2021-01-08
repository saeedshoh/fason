<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\City;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use Carbon\Carbon;
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
        $products = Product::where('store_id', $store->id)->where('product_status_id', 2)->get();
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
        $cities = City::get();
        return view('store.create', compact('cities'));
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
        $products = Product::where('store_id', $stores->id)->where('product_status_id', 2)->get();
        $acceptedProducts = Product::where('store_id', $stores->id)->where('product_status_id', 2)->get();
        $onCheckProducts = Product::where('store_id', $stores->id)->where('product_status_id', 1)->get();
        $hiddenProducts = Product::where('store_id', $stores->id)->where('product_status_id', 3)->get();
        $canceledProducts = Product::where('store_id', $stores->id)->where('product_status_id', 3)->get();
        $deletedProducts = Product::where('store_id', $stores->id)->whereNotNull('deleted_at')->get();
        return view('store.show', compact('stores', 'products', 'acceptedProducts', 'onCheckProducts', 'hiddenProducts', 'canceledProducts', 'deletedProducts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @param  \App\Models\Order  $orders;
     * @param  Carbon\Carbon;
     * @return \Illuminate\Http\Response
     */
    public function salesHistory($slug)
    {
        $id = Store::where('slug', $slug)->first()->id;
        $orders = Order::where('user_id', $id)->get();
        $months = [];

        foreach ($orders as $item) {
            $date = new Carbon($item['updated_at']);
            $date->locale('ru_RU');
            $months[$date->monthName][] = $item;
        }
        $stores = Store::where('id', $id)->first();
        return view('store.salesHistory', compact('orders', 'months', 'stores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        $cities = City::get();
        return view('store.edit', compact('store', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Store $store)
    {
        $data = $request->validated();
        if(isset($request->avatar)){
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,Webp'
            ]);
            $avatar = $request->file('avatar')->store(now()->year . '/' . sprintf("%02d", now()->month));
            $data['avatar'] = $avatar;
        }
        if(isset($request->cover)){
            $request->validate([
                'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,Webp'
            ]);
            $cover = $request->file('cover')->store(now()->year . '/' . sprintf("%02d", now()->month));
            $data['cover'] = $cover;
        }
        $data['user_id'] = Auth::id();
        if(Store::where('id', $store->id)->update($data)) {
            $store = Store::where('id', $store->id)->first();
        }

        return redirect()->route('ft-store.show', $store->slug)->with('success', 'Магазин успешно обновлена!');
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
