<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Log;
use App\Models\City;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use App\Models\StoreEdit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Traits\ImageInvTrait;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Traits\OrderNumberTrait;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    use OrderNumberTrait, ImageInvTrait;

    public function guest($slug)
    {
        $store = Store::where('slug', $slug)->first();
        $products = Product::where('store_id', $store->id)->where('product_status_id', 2)->get();
        if($store == Store::where('user_id', auth()->id())->first()){
            $store = Store::where('slug', $slug)->withoutGlobalScopes()->first();

            Product::withoutGlobalScopes()->where('updated_at', '<', now()->subWeek())->update(['product_status_id' => 4]);

            $products = Product::withoutGlobalScopes()->where('store_id', $store->id)->latest('updated_at')->get();
            $acceptedProducts = Product::withoutGlobalScopes()->where('store_id', $store->id)->accepted()->latest('updated_at')->get();
            $onCheckProducts = Product::withoutGlobalScopes()->where('store_id', $store->id)->onCheck()->latest('updated_at')->get();
            $hiddenProducts = Product::withoutGlobalScopes()->where('store_id', $store->id)->hidden()->latest('updated_at')->get();
            $canceledProducts = Product::withoutGlobalScopes()->where('store_id', $store->id)->canceled()->latest('updated_at')->get();
            $notInStock = Product::withoutGlobalScopes()->where('store_id', $store->id)->notInStock()->latest('updated_at')->get();
            $deletedProducts = Product::withoutGlobalScopes()->where('store_id', $store->id)->deleted()->latest('updated_at')->get();
            return view('store.show', compact('store', 'products', 'acceptedProducts', 'onCheckProducts', 'hiddenProducts', 'canceledProducts', 'notInStock', 'deletedProducts'));
        }
        return view('store.guest', compact('store', 'products'));
    }

    public function index(Request $request)
    {
        session()->forget('previous');
        $acceptedCount = StoreEdit::withoutGlobalScopes()->where('is_active', 1)->count();
        $moderationCount = StoreEdit::withoutGlobalScopes()->where('is_moderation', 1)->count();
        $disabledCount = StoreEdit::withoutGlobalScopes()->where('is_active', 0)->count();
        $disabledUserCount = StoreEdit::withoutGlobalScopes()->where('is_active', 2)->count();
        $starredCount = StoreEdit::withoutGlobalScopes()->whereNotNull('starred_at')->count();

        $stores = StoreEdit::withoutGlobalScopes()
            ->where('name', 'like', '%' . $request->search . '%')
            ->orWhere('address', 'like', '%' . $request->search . '%')
            ->orWhereHas('city', function ($city) use ($request) {
                $city->where('name',  'like', '%' . $request->search . '%');
            })
            ->orderBy('is_active', 'asc')
            ->latest('order_number')
            ->paginate(30)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.stores',
                    compact('stores')
                )->render()
            );
        }
        return view('dashboard.store.index', compact('stores', 'acceptedCount', 'moderationCount', 'disabledCount', 'disabledUserCount', 'starredCount'));
    }

    public function accepted(Request $request)
    {
        session()->forget('previous');
        $storesCount = StoreEdit::withoutGlobalScopes()->count();
        $moderationCount = StoreEdit::withoutGlobalScopes()->where('is_moderation', 1)->count();
        $disabledCount = StoreEdit::withoutGlobalScopes()->where('is_active', 0)->count();
        $disabledUserCount = StoreEdit::withoutGlobalScopes()->where('is_active', 2)->count();
        $starredCount = StoreEdit::withoutGlobalScopes()->whereNotNull('starred_at')->count();

        $stores = StoreEdit::withoutGlobalScopes()
            ->where('is_active', 1)
            ->where(function($store_edit) use($request){
                $store_edit->orWhere('name', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%')
                ->orWhereHas('city', function ($city) use ($request) {
                    $city->where('name',  'like', '%' . $request->search . '%');
                });
            })
            ->latest('order_number')
            ->paginate(30)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.stores',
                    compact('stores')
                )->render()
            );
        }
        return view('dashboard.store.statuses.accepted', compact('stores', 'storesCount', 'moderationCount', 'disabledCount', 'disabledUserCount', 'starredCount'));
    }

    public function moderation(Request $request)
    {
        session()->forget('previous');
        $storesCount = StoreEdit::withoutGlobalScopes()->count();
        $acceptedCount = StoreEdit::withoutGlobalScopes()->where('is_active', 1)->count();
        $disabledCount = StoreEdit::withoutGlobalScopes()->where('is_active', 0)->count();
        $disabledUserCount = StoreEdit::withoutGlobalScopes()->where('is_active', 2)->count();
        $starredCount = StoreEdit::withoutGlobalScopes()->whereNotNull('starred_at')->count();

        $stores = StoreEdit::withoutGlobalScopes()
            ->where('is_moderation', 1)
            ->where(function($store_edit) use($request){
                $store_edit->orWhere('name', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%')
                ->orWhereHas('city', function ($city) use ($request) {
                    $city->where('name',  'like', '%' . $request->search . '%');
                });
            })
            ->latest('order_number')
            ->paginate(30)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.stores',
                    compact('stores')
                )->render()
            );
        }
        return view('dashboard.store.statuses.moderation', compact('stores', 'storesCount', 'acceptedCount', 'disabledCount', 'disabledUserCount', 'starredCount'));
    }

    public function disabled(Request $request)
    {
        session()->forget('previous');
        $storesCount = StoreEdit::withoutGlobalScopes()->count();
        $acceptedCount = StoreEdit::withoutGlobalScopes()->where('is_active', 1)->count();
        $moderationCount = StoreEdit::withoutGlobalScopes()->where('is_moderation', 1)->count();
        $disabledUserCount = StoreEdit::withoutGlobalScopes()->where('is_active', 2)->count();
        $starredCount = StoreEdit::withoutGlobalScopes()->whereNotNull('starred_at')->count();

        $stores = StoreEdit::withoutGlobalScopes()
            ->where('is_active', 0)
            ->where('is_moderation', 0)
            ->where(function($store_edit) use($request){
                $store_edit->orWhere('name', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%')
                ->orWhereHas('city', function ($city) use ($request) {
                    $city->where('name',  'like', '%' . $request->search . '%');
                });
            })
            ->latest('order_number')
            ->paginate(30)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.stores',
                    compact('stores')
                )->render()
            );
        }
        return view('dashboard.store.statuses.disabled', compact('stores', 'storesCount', 'acceptedCount', 'moderationCount', 'disabledUserCount', 'starredCount'));
    }

    public function disabledUser(Request $request)
    {
        session()->forget('previous');
        $storesCount = StoreEdit::withoutGlobalScopes()->count();
        $acceptedCount = StoreEdit::withoutGlobalScopes()->where('is_active', 1)->count();
        $moderationCount = StoreEdit::withoutGlobalScopes()->where('is_moderation', 1)->count();
        $disabledCount = StoreEdit::withoutGlobalScopes()->where('is_active', 0)->count();
        $starredCount = StoreEdit::withoutGlobalScopes()->whereNotNull('starred_at')->count();

        $stores = StoreEdit::withoutGlobalScopes()
            ->where('is_active', 2)
            ->where(function($store_edit) use($request){
                $store_edit->orWhere('name', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%')
                ->orWhereHas('city', function ($city) use ($request) {
                    $city->where('name',  'like', '%' . $request->search . '%');
                });
            })
            ->latest('order_number')
            ->paginate(30)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.stores',
                    compact('stores')
                )->render()
            );
        }
        return view('dashboard.store.statuses.disabledUser', compact('stores', 'storesCount', 'acceptedCount', 'moderationCount', 'disabledCount', 'starredCount'));
    }

    public function starred(Request $request)
    {
        session()->forget('previous');
        $storesCount = StoreEdit::withoutGlobalScopes()->count();
        $acceptedCount = StoreEdit::withoutGlobalScopes()->where('is_active', 1)->count();
        $moderationCount = StoreEdit::withoutGlobalScopes()->where('is_moderation', 1)->count();
        $disabledCount = StoreEdit::withoutGlobalScopes()->where('is_active', 0)->count();
        $disabledUserCount = StoreEdit::withoutGlobalScopes()->where('is_active', 2)->count();

        $stores = StoreEdit::withoutGlobalScopes()
            ->whereNotNull('starred_at')
            ->where(function($store_edit) use($request){
                $store_edit->orWhere('name', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%')
                ->orWhereHas('city', function ($city) use ($request) {
                    $city->where('name',  'like', '%' . $request->search . '%');
                });
            })
            ->latest('order_number')
            ->paginate(30)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.stores',
                    compact('stores')
                )->render()
            );
        }
        return view('dashboard.store.statuses.starred', compact('stores', 'storesCount', 'acceptedCount', 'moderationCount', 'disabledCount', 'disabledUserCount'));
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
        if ($request->ajax()) {
            $data = $request->validated();
            $data['user_id'] = Auth::id();
            $month = public_path('/storage/') . now()->year . '/' . sprintf("%02d", now()->month);
            if (!File::isDirectory($month)) {
                File::makeDirectory($month);
            }

            $avatar_json = $request->avatar;
            $avatar_path = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid() . '.jpg';
            if (preg_match('/^data:image\/(\w+);base64,/', $avatar_json)) {
                $vtr = substr($avatar_json, strpos($avatar_json, ',') + 1);
                $vtr = base64_decode($vtr);
                Storage::disk('public')->put($avatar_path, $vtr);
                $data['avatar'] = $this->saveAvatar($avatar_path);
            };

            $cover_json = $request->cover;
            $cover_path = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid() . '.jpg';
            if (preg_match('/^data:image\/(\w+);base64,/', $cover_json)) {
                $cvr = substr($cover_json, strpos($cover_json, ',') + 1);
                $cvr = base64_decode($cvr);
                Storage::disk('public')->put($cover_path, $cvr);
                $data['cover'] = $this->saveCover($cover_path);
            };

            $store = Store::create($data + ['is_moderation' => 1]);
            StoreEdit::create($data + ['store_id' => $store->id, 'is_moderation' => 1]);
        }
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

        $products = Product::withoutGlobalScopes()->where('store_id', $store->id)->latest('updated_at')->get();
        $acceptedProducts = Product::withoutGlobalScopes()->where('store_id', $store->id)->accepted()->latest('updated_at')->get();
        $onCheckProducts = Product::withoutGlobalScopes()->where('store_id', $store->id)->onCheck()->latest('updated_at')->get();
        $hiddenProducts = Product::withoutGlobalScopes()->where('store_id', $store->id)->hidden()->latest('updated_at')->get();
        $canceledProducts = Product::withoutGlobalScopes()->where('store_id', $store->id)->canceled()->latest('updated_at')->get();
        $notInStock = Product::withoutGlobalScopes()->where('store_id', $store->id)->notInStock()->latest('updated_at')->get();
        $deletedProducts = Product::withoutGlobalScopes()->where('store_id', $store->id)->deleted()->latest('updated_at')->get();
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
        // return $request;
        if ($request->ajax()) {
            $store = Store::withoutGlobalScopes()->find($store);

            $data = $request->validated();
            $month = public_path('/storage/') . now()->year . '/' . sprintf("%02d", now()->month);
            if (!File::isDirectory($month)) {
                File::makeDirectory($month);
            }

            $avatar_json = $request->avatar;
            $avatar_path = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid() . '.jpg';
            if (preg_match('/^data:image\/(\w+);base64,/', $avatar_json)) {
                $vtr = substr($avatar_json, strpos($avatar_json, ',') + 1);
                $vtr = base64_decode($vtr);
                Storage::disk('public')->put($avatar_path, $vtr);
                $data['avatar'] = $this->saveAvatar($avatar_path);
            };

            $cover_json = $request->cover;
            $cover_path = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid() . '.jpg';
            if (preg_match('/^data:image\/(\w+);base64,/', $cover_json)) {
                $cvr = substr($cover_json, strpos($cover_json, ',') + 1);
                $cvr = base64_decode($cvr);
                Storage::disk('public')->put($cover_path, $cvr);
                $data['cover'] = $this->saveCover($cover_path);
            };
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
                'description' => 'Название магазина: ' . $request->name . ', Адрес: ' . $request->address . ', Описание: ' . $request->description . ', Город: ' . $city
            ]);
            if (Str::contains(url()->previous(), 'dashboard/stores/showStoreInfo/')) {
                return response()->json([
                    'where'     => 'dashboard',
                    'parameter' => session('previous')
                ]);
            } else {
                return response()->json([
                    'where'     => 'website',
                    'parameter' => $store->slug
                ]);
            }
        }
    }

    public function usefulLinks($slug)
    {
        return view('useful_links.moderation')->with(['title' => 'Сохранено! Ваши изменения вступят в силу как только пройдут модерацию.',  'is_back' => 0, 'route' => $slug,]);
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
        if(!session('previous')){
            session(['previous' => url()->previous()]);
        }
        $previous = session('previous');
        $store = Store::withoutGlobalScopes()->find($store);

        $orders = [];
        if (isset($store->orders)) {
            $orders = Order::whereIn('product_id', $store->orders->pluck('product_id'))
                ->join('products', 'orders.product_id', '=', 'products.id')
                ->take(15)
                ->get();
        }
        $store_edit = StoreEdit::where('store_id', $store)->where('is_moderation', '=', 1)->first();

        return view('dashboard.store.show', compact('store', 'orders', 'store_edit', 'previous'));
    }

    public function profile_orders(Request $request, $store)
    {
        $previous = session('previous');
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
            ->paginate(30)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.show_orders',
                    compact('store', 'orders')
                )->render()
            );
        }
        return view('dashboard.store.profile.orders', compact('store', 'orders', 'previous'));
    }

    public function profile_edit($store)
    {
        $previous = session('previous');
        $store = StoreEdit::withoutGlobalScopes()->find($store);
        $cities = City::get();

        return view('dashboard.store.profile.edit', compact('store', 'cities', 'previous'));
    }

    public function profile_products(Request $request, $store)
    {
        $previous = session('previous');
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
            ->paginate(30)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.products',
                    compact('store', 'products')
                )->render()
            );
        }
        return view('dashboard.store.profile.products', compact('store', 'products', 'previous'));
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
            $store->store_edit->update(['starred_at' => null]);
        } else {
            $store->update(['starred_at' => now()]);
            $store->store_edit->update(['starred_at' => now()]);
        }
        return redirect()->back();
    }

    public function order(Request $request)
    {
        $this->changeOrder($request, new Store());
        $this->changeOrder($request, new StoreEdit());
    }
}
