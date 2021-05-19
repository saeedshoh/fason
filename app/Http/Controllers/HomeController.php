<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\ItemsForPage;
use App\Models\Log;
use App\Models\Monetization;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->stores = Store::get();
        $this->categories = Category::get();
        $this->products = Product::get();
        $this->banners = Banners::latest()->get();
        $this->monetizations = Monetization::get();
    }
    public function dashboard()
    {
        $stores = Store::withoutGlobalScopes()->get();
        $total = [];
        foreach ($stores as $store) {
            $store_orders = $store->orders;
            $totalsumm = [];
            foreach ($store_orders->where('order_status_id', 3) as $item) {
                array_push($totalsumm, $item->total);
            }
            $totalsumm = array_sum($totalsumm);
            if ($totalsumm != null) {
                $total[$store->id] =  intval($totalsumm);
            }
        }
        arsort($total);
        $total = array_slice($total, 0, 5, true);
        [$keys, $values] = Arr::divide($total);
        $topstores = collect();
        foreach ($total as $key => $value) {
           $topstores->push($store = Store::withoutGlobalScopes()->select('id','name', 'created_at', 'is_active', 'address', DB::raw("$value as orders"))->where('id', $key)->get());
        }
        $topstores = $topstores->flatten();
        $months = Order::where('order_status_id', 3)->select(DB::raw("SUM(total) as total"), DB::raw("MONTH(created_at) as months"))->groupBy('months')->get();

        $now = Carbon::now();
        $from = $now->startOfWeek()->format('Y-m-d');
        $to = $now->endOfWeek()->format('Y-m-d');
        // dd(date('2021-05-12'));
        $salesSum = Order::where('order_status_id', 3)->sum('total');
        $ordersCount = Order::where('order_status_id', 3)->count('id');
        $productsCount = Product::withoutGlobalScopes()->count();
        $newProductsCount = Product::withoutGlobalScopes()->whereBetween('updated_at', [$from, $to])->count();
        $onCheckProductsCount = Product::withoutGlobalScopes()->where('product_status_id', '1')->count();
        $cancelledCheckProductsCount = Product::withoutGlobalScopes()->where('product_status_id', '3')->count();

        $deletedProductsCount = Log::where('table', 'Продукты')->where('action', 3)->count();
        $profitIncludingCommission = Order::where('order_status_id', 3)->sum('margin') + $salesSum;
        $storesCount = Store::withoutGlobalScopes()->count();
        $newStores = Store::withoutGlobalScopes()->whereBetween('updated_at', [$now->startOfMonth()->format('Y-m-d'), $now->endOfMonth()->format('Y-m-d')])->orderByDesc('id')->get();

        $usersCount = User::where('status', 2)->count();
        $orderCanceledCount = Order::where('order_status_id', 2)->count();
        $orderReturnsCount = Order::where('order_status_id', 5)->count();
        return view('dashboard.home', compact('cancelledCheckProductsCount', 'onCheckProductsCount', 'orderReturnsCount', 'orderCanceledCount', 'salesSum', 'ordersCount', 'productsCount', 'newProductsCount', 'deletedProductsCount', 'profitIncludingCommission', 'storesCount', 'newStores', 'topstores', 'usersCount'));
    }

    public function index(Request $request)
    {
        $stores = $this->stores;
        $categories = $this->categories->where('parent_id', 0)->sortBy('order_no');
        $sliders = $this->banners->where('type', 1);
        $middle_banner = $this->banners->where('type', 2)->where('position', 2)->first();
        $monetizations = $this->monetizations;
        $itemsForPage = ItemsForPage::first()->qty;
        $countProd = Order::select('product_id', DB::raw('count(product_id) as countProd'))
            ->groupBy('product_id');

        $topProducts = Product::where('product_status_id', 2)
            ->select(DB::raw('products.*, countProd.countProd'))
            ->leftJoinSub($countProd, 'countProd', function ($join) {
                $join->on('products.id', '=', 'countProd.product_id');
            })->orderByDesc('countProd')->take($itemsForPage)->get();
        $newProducts = Product::where('product_status_id', 2)->orderByDesc('updated_at')->take($itemsForPage)->get();
        return view('home', compact('stores', 'categories', 'sliders', 'middle_banner', 'topProducts', 'newProducts', 'monetizations'));
    }

    public function filter(Request $request)
    {
        $back = url()->previous();
        $productss = Product::whereNotNull('id')->where('product_status_id', 2);
        if ($request->sort == 'new') {
            $productss->orderByDesc('id');
        } elseif ($request->sort == 'cheap') {
            $productss->orderBy('price');
        } elseif ($request->sort == 'expensive') {
            $productss->orderByDesc('price');
        }
        if ($request->priceFrom) {
            $productss->where('price', '>=', $request->priceFrom);
        }
        if ($request->priceTo) {
            $productss->where('price', '<=', $request->priceTo);
        }
        $store = Store::where('city_id', $request->city)->get('id');
        $productss->whereIn('store_id', $store);
        $products = $productss->get();
        return view('filter', compact('products', 'back'));
    }

    public function search(Request $request)
    {
        $back = url()->previous();
        $products = Product::where(DB::raw('upper(name)'), 'LIKE', '%' . strtoupper($request->q) . '%')->where('product_status_id', 2)->get();
        return view('search', compact('products', 'back'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addToFavorites(Request $request)
    {
        $user_id = Auth::user()->id;
        $exist = Favorite::where('product_id', $request->product_id)
            ->where('user_id', $user_id)
            ->first();
        if ($exist) {
            $exist->update([
                'user_id' => $user_id,
                'product_id' => $request->product_id,
                'status'    => $exist->status == 1 ? 0 : 1
            ]);
        } else {
            Favorite::updateOrCreate([
                'user_id' => $user_id,
                'product_id' => $request->product_id,
                'status'    => $request->status
            ]);
        }
        return response()->json(['status' => 'Добавлено']);
    }
}
