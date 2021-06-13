<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Log;
use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use App\Models\StoreEdit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class StoreController extends Controller
{
    public function __construct()
    {    
        // $this->middleware('permission:create-stores', ['only' => ['create', 'store']]);
        // $this->middleware('permission:update-stores', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-stores', ['only' => ['destroy']]);
        // $this->middleware('permission:read-stores', ['only' => ['index', 'show']]);
    }
    
    public function guest($slug)
    {
        $store = Store::where('slug', $slug)->first();
        $products = Product::where('store_id', $store->id)->where('product_status_id', 2)->get();
        return view('store.guest', compact('store', 'products'));
    }

    public function index(Request $request)
    {
        $stores = StoreEdit::withoutGlobalScopes()
            ->where('name', 'like', '%' . $request->search . '%')
            ->orWhere('address', 'like', '%' . $request->search . '%')
            ->orWhereHas('city', function ($city) use ($request) {
                $city->where('name',  'like', '%' . $request->search . '%');
            })
            ->orderBy('is_active', 'asc')
            ->latest()
            ->paginate(10)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.stores',
                    compact('stores')
                )->render()
            );
        }
        return view('dashboard.store.index', compact('stores'));
    }

    public function accepted(Request $request)
    {
        $stores = StoreEdit::withoutGlobalScopes()
            ->where('is_active', 1)
            ->orWhere('name', 'like', '%' . $request->search . '%')
            ->orWhere('address', 'like', '%' . $request->search . '%')
            ->orWhereHas('city', function ($city) use ($request) {
                $city->where('name',  'like', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.stores',
                    compact('stores')
                )->render()
            );
        }
        return view('dashboard.store.statuses.accepted', compact('stores'));
    }

    public function moderation(Request $request)
    {
        $disabledCount = StoreEdit::withoutGlobalScopes()->where('is_active', 0)->count();
        $disabledUserCount = StoreEdit::withoutGlobalScopes()->where('is_active', 2)->count();
        $acceptedCount = StoreEdit::withoutGlobalScopes()->where('is_active', 1)->count();
        $storesCount = StoreEdit::withoutGlobalScopes()->count();
        $stores = StoreEdit::withoutGlobalScopes()
            ->where('is_moderation', 1)
            ->latest()
            ->paginate(10)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.stores',
                    compact('stores')
                )->render()
            );
        }
        return view('dashboard.store.statuses.moderation', compact('storesCount', 'acceptedCount', 'disabledCount', 'stores', 'disabledUserCount'));
    }

    public function disabled(Request $request)
    {
        $moderationCount = StoreEdit::withoutGlobalScopes()->where('is_moderation', 1)->count();
        $acceptedCount = StoreEdit::withoutGlobalScopes()->where('is_active', 1)->count();
        $storesCount = StoreEdit::withoutGlobalScopes()->count();
        $disabledUserCount = StoreEdit::withoutGlobalScopes()->where('is_active', 2)->count();
        $stores = StoreEdit::withoutGlobalScopes()
            ->where('is_active', 0)
            ->latest()
            ->paginate(10)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.stores',
                    compact('stores')
                )->render()
            );
        }
        return view('dashboard.store.statuses.disabled', compact('storesCount', 'acceptedCount', 'moderationCount', 'stores', 'disabledUserCount'));
    }

    public function disabledUser(Request $request)
    {
        $moderationCount = StoreEdit::withoutGlobalScopes()->where('is_moderation', 1)->count();
        $acceptedCount = StoreEdit::withoutGlobalScopes()->where('is_active', 1)->count();
        $storesCount = StoreEdit::withoutGlobalScopes()->count();
        $stores = StoreEdit::withoutGlobalScopes()
            ->where('is_active', 2)
            ->latest()
            ->paginate(10)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.stores',
                    compact('stores')
                )->render()
            );
        }
        return view('dashboard.store.statuses.disabledUser', compact('storesCount', 'acceptedCount', 'moderationCount', 'stores'));
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
        $month = public_path('/storage/') . now()->year . '/' . sprintf("%02d", now()->month);
        if (!File::isDirectory($month)) {
            File::makeDirectory($month);
        }
        if (isset($request->avatar)) {
            $avatarPath = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid() . $request->file('avatar')->getClientOriginalExtension();
            $avatar = Image::make($request->file('avatar'))->encode('jpg', 75)->fit(270, 215, function ($constraint) {
                $constraint->aspectRatio();
            });
            $avatar->save(public_path('/storage/' . $avatarPath));
            $data['avatar'] = $avatarPath;
        }
        if (isset($request->cover)) {
            $coverPath = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid() . $request->file('cover')->getClientOriginalExtension();
            $cover = Image::make($request->file('cover'))->encode('jpg', 75)->fit(840, 215, function ($constraint) {
                $constraint->aspectRatio();
            });
            $cover->save(public_path('/storage/' . $coverPath));
            $data['cover'] = $coverPath;
        }

        $store = Store::create($data + ['is_moderation' => 1]);
        StoreEdit::create($data + ['store_id' => $store->id, 'is_moderation' => 1]);
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

        Product::withoutGlobalScopes()->where('updated_at', '<', now()->subWeek())->update(['product_status_id' => 4]);

        $products = Product::withoutGlobalScopes()->where('store_id', $store->id)->get();
        $acceptedProducts = Product::withoutGlobalScopes()->where('store_id', $store->id)->accepted()->get();
        $onCheckProducts = Product::withoutGlobalScopes()->where('store_id', $store->id)->onCheck()->get();
        $hiddenProducts = Product::withoutGlobalScopes()->where('store_id', $store->id)->hidden()->get();
        $canceledProducts = Product::withoutGlobalScopes()->where('store_id', $store->id)->canceled()->get();
        $notInStock = Product::withoutGlobalScopes()->where('store_id', $store->id)->notInStock()->get();
        $deletedProducts = Product::withoutGlobalScopes()->where('store_id', $store->id)->deleted()->get();
        return view('store.show', compact('store', 'products', 'acceptedProducts', 'onCheckProducts', 'hiddenProducts', 'canceledProducts', 'notInStock', 'deletedProducts'));
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
        return view('store.salesHistory', compact('orders', 'months', 'stores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $store = Store::withoutGlobalScopes()->where('slug', $slug)->first();
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
        $store = Store::withoutGlobalScopes()->find($store);
        $data = $request->validated();
        $month = public_path('/storage/') . now()->year . '/' . sprintf("%02d", now()->month);
        if (!File::isDirectory($month)) {
            File::makeDirectory($month);
        }
        if ($request->file('avatar')) {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,Webp'
            ]);
            $avatarPath = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid() . $request->file('avatar')->getClientOriginalExtension();

            $avatar = Image::make($request->file('avatar'))->encode('jpg', 75)->fit(270, 215, function ($constraint) {
                $constraint->aspectRatio();
            });
            $avatar->save(public_path('/storage/' . $avatarPath));
            $data['avatar'] = $avatarPath;
        }
        if ($request->file('cover')) {
            $request->validate([
                'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,Webp'
            ]);
            $coverPath = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid() . $request->file('cover')->getClientOriginalExtension();
            $cover = Image::make($request->file('cover'))->encode('jpg', 75)->fit(840, 215, function ($constraint) {
                $constraint->aspectRatio();
            });
            $cover->save(public_path('/storage/' . $coverPath));
            $data['cover'] = $coverPath;
        }
        // change to after Roles implementation
        // $user = User::find(auth()->id);
        // if(!$user->isAn('admin') && StoreEdit::where('store_id', $store)->withoutGlobalScopes()->update($data + ['is_active' => 0, 'is_moderation' => 1])) {
        if (auth()->user()->status == 2 && StoreEdit::withoutGlobalScopes()->where('store_id', $store->id)->update($data + ['is_active' => 0, 'is_moderation' => 1])) {
            $store->update(['is_moderation' => 1]);
        } else {
            StoreEdit::withoutGlobalScopes()->where('store_id', $store->id)->update($data);
            $store->update($data);
        }
        $city = City::where('id', $request->city_id)->first()->name;
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 2,
            'table'  => 'Магазины',
            'description' => 'Название магазина: ' . $request->name . ',    Адрес: ' . $request->address . ', Описание: ' . $request->description . ', Город: ' . $city
        ]);
        if (Str::contains(url()->previous(), 'dashboard/stores/showStoreInfo/')) {
            return redirect()->route('stores.index');
        } else {
            return view('useful_links.moderation')->with(['title' => 'Сохранено! Ваши изменения вступят в силу как только пройдут модерацию.',  'is_back' => 0, 'route' => $store->slug,]);
        }
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
            'table'  => 'Магазины',
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
    public function toggleUser($store)
    {
        $store = StoreEdit::withoutGlobalScopes()->where('store_id', $store)->first();
        $stored = Store::withoutGlobalScopes()->where('id', $store->store_id)->first();

        if ($store->is_active == 1) {
            $store->update(['is_active' => 2]);
            $stored->update(['is_active' => 2]);
        } else {
            $store->update(['is_active' => 1]);
            $stored->update([
                'name' => $store->name,
                'slug' => $store->slug,
                'description' => $store->description,
                'address' => $store->address,
                'avatar' => $store->avatar,
                'cover' => $store->cover,
                'city_id' => $store->city_id,
                'city_id' => $store->city_id,
                'is_active' => 1,
            ]);
        }
        return redirect()->route('ft-store.show', $stored->slug);
    }

    public function toggle($store)
    {
        $store = StoreEdit::withoutGlobalScopes()->where('store_id', $store)->first();
        $stored = Store::withoutGlobalScopes()->where('id', $store->store_id)->first();

        if ($store->is_active == 1 || $store->is_active == 2) {
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
                'city_id' => $store->city_id,
                'is_moderation' => 0,
                'is_active' => 1,
            ]);
        }
        return redirect()->back();
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
        if ($request->ajax()) {
            if (Store::where('name', $name)->withoutGlobalScopes()->exists()) {
                return response(['exist' => true], 200);
            }
            return response(['exist' => false], 200);
        }
        abort(404);
    }

    public function showStoreInfo($store)
    {
        $store = Store::withoutGlobalScopes()->find($store);

        $orders = [];
        if (isset($store->orders)) {
            $orders = Order::whereIn('product_id', $store->orders->pluck('product_id'))
                ->join('products', 'orders.product_id', '=', 'products.id')
                ->take(15)
                ->get();
        }
        $store_edit = StoreEdit::where('store_id', $store)->where('is_moderation', '=', 1)->first();

        return view('dashboard.store.show', compact('store', 'orders', 'store_edit'));
    }

    public function profile_orders(Request $request, $store)
    {
        $store = Store::withoutGlobalScopes()->find($store);

        $orders = Order::whereIn('product_id', $store->orders->pluck('product_id'))
            ->where(function ($query) use ($request) {
                $query->where('orders.id', 'like', '%' . $request->search . '%')
                    ->orWhereHas('product', function ($product) use ($request) {
                        $product->where('name',  'like', '%' . $request->search . '%');
                    })
                    ->orWhere('orders.total', 'like', '%' . $request->search . '%')
                    ->orWhere('orders.quantity', 'like', '%' . $request->search . '%');
            })
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->paginate(10)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.show_orders',
                    compact('store', 'orders')
                )->render()
            );
        }
        return view('dashboard.store.profile.orders', compact('store', 'orders'));
    }

    public function profile_edit($store)
    {
        $store = StoreEdit::withoutGlobalScopes()->find($store);
        $cities = City::get();

        return view('dashboard.store.profile.edit', compact('store', 'cities'));
    }

    public function profile_products(Request $request, $store)
    {
        $store = Store::withoutGlobalScopes()->find($store);

        $products = Product::where('store_id', $store->id)
            ->withoutGlobalScopes()
            ->where('name', 'like', '%' . $request->search . '%')
            ->orWhereHas('store', function ($store) use ($request) {
                $store->where('name',  'like', '%' . $request->search . '%');
            })
            ->orWhereHas('category', function ($category) use ($request) {
                $category->where('name',  'like', '%' . $request->search . '%');
            })
            ->latest('updated_at')
            ->paginate(10)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.products',
                    compact('store', 'products')
                )->render()
            );
        }
        return view('dashboard.store.profile.products', compact('store', 'products'));
    }

    public function stores(Request $request)
    {
        $stores = Store::where('name', 'like', '%' . $request->search . '%')
            ->withCount('orders')
            ->latest('starred_at')
            ->latest('orders_count')
            ->paginate(20)->withQueryString();
        if ($request->ajax()) {
            return [
                'posts' => view('ajax.stores', compact('stores'))->render(),
                'next_page' => $stores->nextPageUrl()
            ];
        }
        return view('stores', compact('stores'));
    }

    public function star($id)
    {
        $store = Store::withoutGlobalScopes()->find($id);
        if($store->starred_at) {
            $store->update(['starred_at' => null]);
        } else {
            $store->update(['starred_at' => now()]);
        }
        return redirect()->back();
    }
}
