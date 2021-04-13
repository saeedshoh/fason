<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Log;
use App\Models\City;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Models\StoreEdit;
use Illuminate\Support\Facades\URL;

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
        // $stores = Store::orderBy('is_active', 'asc')->withoutGlobalScopes()->latest()->paginate(20);
        $stores = StoreEdit::orderBy('is_active', 'asc')->withoutGlobalScopes()->latest()->paginate(20);
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
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $month = public_path('/storage/').now()->year . '/' . sprintf("%02d", now()->month);
        if(!File::isDirectory($month)){
            File::makeDirectory($month);
        }
        if(isset($request->avatar)){
            // $request->validate([
            //     'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,Webp'
            // ]);
            $avatarPath = now()->year . '/' . sprintf("%02d", now()->month).'/'.uniqid().$request->file('avatar')->getClientOriginalExtension();
            $avatar = Image::make($request->file('avatar'))->encode('jpg', 75)->fit(270, 215, function ($constraint) {
                $constraint->aspectRatio();
            });
            $avatar->save(public_path('/storage/'.$avatarPath));
            $data['avatar'] = $avatarPath;
        }
        if(isset($request->cover)){
            // $request->validate([
            //     'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,Webp'
            // ]);
            $coverPath = now()->year . '/' . sprintf("%02d", now()->month).'/'.uniqid().$request->file('cover')->getClientOriginalExtension();
            $cover = Image::make($request->file('cover'))->encode('jpg', 75)->fit(840, 215, function ($constraint) {
                $constraint->aspectRatio();
            });
            $cover->save(public_path('/storage/'.$coverPath));
            $data['cover'] = $coverPath;
        }

        $store = Store::create($data);
        StoreEdit::create($data + ['store_id' => $store->id, 'is_moderation' => 0]);
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
        $store = Store::where('slug', $slug)->withoutGlobalScopes()->first();
        $products = Product::where('store_id', $store->id)->latest('updated_at')->get();
        $acceptedProducts = Product::where('store_id', $store->id)->where('product_status_id', 2)->latest('updated_at')->get();
        $onCheckProducts = Product::where('store_id', $store->id)->where('product_status_id', 1)->latest('updated_at')->get();
        $hiddenProducts = Product::where('store_id', $store->id)->where('updated_at', '<', now()->subWeek())->withoutGlobalScopes()->latest('updated_at')->get();
        $canceledProducts = Product::where('store_id', $store->id)->where('product_status_id', 3)->latest('updated_at')->get();
        $notInStock = Product::where('store_id', $store->id)->where('quantity', '<', 1)->withoutGlobalScopes()->latest('updated_at')->get();
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
        $stores = Store::with('orders')->where('slug', $slug)->withoutGlobalScopes()->first();
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
        $store = Store::where('slug', $slug)->withoutGlobalScopes()->first();
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
    public function update(StoreRequest $request, $store)
    {   
        $data = $request->validated();
        
        $month = public_path('/storage/').now()->year . '/' . sprintf("%02d", now()->month);
        if(!File::isDirectory($month)){
            File::makeDirectory($month);
        }
        if(isset($request->avatar)){
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,Webp'
            ]);
            $avatarPath = now()->year . '/' . sprintf("%02d", now()->month).'/'.uniqid().$request->file('avatar')->getClientOriginalExtension();

            $avatar = Image::make($request->file('avatar'))->encode('jpg', 75)->fit(270, 215, function ($constraint) {
                $constraint->aspectRatio();
            });
            $avatar->save(public_path('/storage/'.$avatarPath));
            $data['avatar'] = $avatarPath;
        }
        if(isset($request->cover)){
            $request->validate([
                'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,Webp'
            ]);
            $coverPath = now()->year . '/' . sprintf("%02d", now()->month).'/'.uniqid().$request->file('cover')->getClientOriginalExtension();
            $cover = Image::make($request->file('cover'))->encode('jpg', 75)->fit(840, 215, function ($constraint) {
                $constraint->aspectRatio();
            });
            $cover->save(public_path('/storage/'.$coverPath));
            $data['cover'] = $coverPath;
        }
        // $data['user_id'] = Auth::id();
        // if(Store::where('id', $store)->withoutGlobalScopes()->update($data + ['is_active' => 0])) {
        //     $store = Store::where('id', $store)->withoutGlobalScopes()->first();
        // }
        
        if(StoreEdit::where('store_id', $store)->withoutGlobalScopes()->update($data + ['is_active' => 0, 'is_moderation' => 1])) {
            $store = StoreEdit::where('store_id', $store)->withoutGlobalScopes()->first();
        }
        $city = City::where('id', $request->city_id)->first()->name;
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 2,
            'table'  => ' Магазины',
            'description' => 'Название магазина: ' . $request->name . ',    Адрес: ' . $request->address . ', Описание: ' . $request->description . ', Город: ' . $city
        ]);
        return view('useful_links.moderation')->with(['title' => 'Сохранено! Ваши изменения вступят в силу как только пройдут модерацию.',  'is_back' => $request->is_back == 1 ? 1 : 0, 'route' => $store->slug,]);
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
    public function toggle($store)
    {
        $store = StoreEdit::withoutGlobalScopes()->where('store_id', $store)->first();
        $stored = Store::withoutGlobalScopes()->where('id', $store->store_id)->first();
    
        if($store->is_active) {
            $store->update(['is_active' => 0]);
            $stored->update(['is_active' => 0]);
        } else {
            $store->update(['is_active' => 1, 'is_moderation' => 0]);
            $stored->update([
                'name' => $store->name,    
                'slug' => $store->slug,    
                'description' => $store->description,    
                'address' => $store->address,    
                'avatar' => $store->avatar,    
                'cover' => $store->cover,    
                'city_id' => $store->city_id,
                'is_active' => 1,
            ]);
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
            if (Store::where('name', $name)->withoutGlobalScopes()->exists()) {
                return response(['exist' => true], 200);
            }
            return response(['exist' => false], 200);
        }
        abort(404);
    }

    public function showStoreInfo($store) {
        $store = Store::withoutGlobalScopes()->find($store);

        $orders = Order::whereIn('product_id', $store->orders->pluck('product_id'))
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->take(15)->get();
        $store_edit = StoreEdit::where('store_id', $store->id)->where('is_moderation', '=', 1)->first();

        return view('dashboard.store.show', compact('store', 'orders', 'store_edit'));
    }

    public function profile_orders($store) {
        $store = Store::withoutGlobalScopes()->find($store);

        $orders = Order::whereIn('product_id', $store->orders->pluck('product_id'))
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->paginate(35);

        return view('dashboard.store.profile.orders', compact('store', 'orders'));
    }
    public function profile_edit($store)
    {
        $store = StoreEdit::withoutGlobalScopes()->find($store);
        $cities = City::get();

        return view('dashboard.store.profile.edit', compact('store', 'cities'));

    }
    public function profile_products($store)    {
        $store = Store::withoutGlobalScopes()->find($store);

        $products = Product::where('store_id', $store->id)->paginate(35);

        return view('dashboard.store.profile.products', compact('store', 'products'));
    }
}
