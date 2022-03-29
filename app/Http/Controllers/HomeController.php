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
        $this->categories = Category::get();
        $this->products = Product::get();
        $this->banners = Banners::latest()->get();
        $this->monetizations = Monetization::get();
    }
    public function dashboard()
    {
        if(!auth()->user()->hasRole('Administrator'))
        {
            return redirect()->route('products.index');
        }

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
            $topstores->push($store = Store::withoutGlobalScopes()->select('id', 'name', 'created_at', 'is_active', 'address', DB::raw("$value as orders"))->where('id', $key)->get());
        }
        $topstores = $topstores->flatten();
        $months = Order::where('order_status_id', 3)->select(DB::raw("SUM(total) as total"), DB::raw("MONTH(created_at) as months"))->groupBy('months')->get();

        $now = Carbon::now();
        $from = $now->startOfWeek()->format('Y-m-d');
        $to = $now->endOfWeek()->format('Y-m-d');
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
        if(!auth()->guest() && auth()->user()->status !== 2){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect(route('home'));
        }
        $stores = null;
        $starred_stores = Store::starred()->latest('order_number')->take(10)->get();
        if($starred_stores->count() < 10) {
            $popular_stores = Store::where('starred_at', null)->withCount('orders')->latest('orders_count')->take(10)->get();
            if($starred_stores->count() == 0) {
                $stores = $popular_stores;
            } else {
                $stores = $starred_stores->merge($popular_stores)->take(10);
            }
        } else {
            $stores = $starred_stores;
        }
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
        $newProducts = Product::where('product_status_id', 2)->orderByDesc('created_at')->take($itemsForPage)->get();
        return view('home', compact('stores', 'categories', 'sliders', 'middle_banner', 'topProducts', 'newProducts', 'monetizations'));
    }

    public function search(Request $request)
    {
        $back = url()->previous();
        $products = Product::where(DB::raw('upper(name)'), 'LIKE', '%' . strtoupper($request->q) . '%')->where('product_status_id', 2)->get();
        return view('search', compact('products', 'back'));
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
