<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Log;
use App\Models\City;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
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
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $store = Store::where('slug', $slug)->first();
        $products = Product::where('store_id', $store->id)->get();
        $acceptedProducts = Product::where('store_id', $store->id)->where('product_status_id', 2)->get();
        $onCheckProducts = Product::where('store_id', $store->id)->where('product_status_id', 1)->get();
        $hiddenProducts = Product::where('store_id', $store->id)->where('updated_at', '<', now()->subWeek())->withoutGlobalScopes()->get();
        $canceledProducts = Product::where('store_id', $store->id)->where('product_status_id', 3)->get();
        $notInStock = Product::where('store_id', $store->id)->where('quantity', '<', 1)->withoutGlobalScopes()->get();
        // $deletedProducts = Product::where('store_id', $stores->id)->whereNotNull('deleted_at')->get();
        return view('store.show', compact('store', 'products', 'acceptedProducts', 'onCheckProducts', 'hiddenProducts', 'canceledProducts', 'notInStock'));
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
        $stores = Store::with('orders')->where('slug', $slug)->first();
        $orders = Order::where('user_id', $stores->user_id)->get();
        $months = [];

        foreach ($orders as $item) {
            $date = new Carbon($item['updated_at']);
            $date->locale('ru_RU');
            $months[$date->monthName][] = $item;
        }
        // dd($stores);
        // $stores = Store::where('id', $id)->first();
        return view('store.salesHistory', compact('orders', 'months', 'stores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit ($slug)
    {
        $store = Store::where('slug', $slug)->first();
        $cities = City::get();
        return view('store.edit', compact('store', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
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
        if(Store::where('id', $store->id)->update($data + ['is_active' => 0])) {
            $store = Store::where('id', $store->id)->first();
        }
        $city = City::where('id', $request->city_id)->first()->name;
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 2,
            'table'  => ' Магазины',
            'description' => 'Название магазина: ' . $request->name . ',    Адрес: ' . $request->address . ', Описание: ' . $request->description . ', Город: ' . $city
        ]);

        return redirect()->route('ft-store.show', $store->slug)->with('success', 'Магазин успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $city = City::where('id', $store->city_id)->first('name');
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 3,
            'table'  => ' Магазины',
            'description' => 'Название магазина: ' . $store->name . ',    Адрес: ' . $store->address . ', Описание: ' . $store->description . ', Город: ' . $city
        ]);
        $store->delete();
        return redirect(route('stores.index'))->with('success', 'Магазин успешно удалена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function toggle(Store $store)
    {
        if($store->is_active) {
            $store->update(['is_active' => 0]);
        } else {
            $store->update(['is_active' => 1]);
        }
        return redirect(route('stores.index'))->with('success', 'Магазин успешно изменен!');
    }

    /**
     * Check if the specified resource exists in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $name
     * @return \Illuminate\Http\JsonResponse
     */
    public function exist(Request $request, $name)
    {
        if($request->ajax()){
            if (Store::where('name', $name)->exists()) {
                return response(['exist' => true], 200);
            }
            return response(['exist' => false], 200);
        }
        abort(404);
    }

    public function showStoreInfo(Store $store){
        $orders = Order::whereIn('product_id', $store->orders->pluck('product_id'))
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->paginate(50);
        return view('dashboard.store.show', compact('store', 'orders'));
    }
}
