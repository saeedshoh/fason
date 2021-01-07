<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
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
    }
    public function dashboard() {
        return view('dashboard.home');
    }

    public function index()
    {
        $stores = $this->stores;
        $categories = $this->categories->where('parent_id', 0);
        $products = $this->products->where('product_status_id', 2);
        $sliders = $this->banners->where('type', 1);
        $middle_banner = $this->banners->where('type', 2)->where('position', 2)->first();

        $countProd = Order::select('product_id', DB::raw('count(product_id) as countProd'))
            ->groupBy('product_id');

        $topProducts = Product::where('product_status_id', 2)
            ->select(DB::raw('products.*, countProd.countProd'))
            ->leftJoinSub($countProd, 'countProd', function ($join) {
                $join->on('products.id', '=', 'countProd.product_id');
            })->orderByDesc('countProd')->limit(20)->get();
        $newProducts = Product::where('product_status_id', 2)->orderByDesc('updated_at')->limit(20)->get();

        return view('home', compact('stores', 'categories', 'products', 'sliders', 'middle_banner', 'topProducts', 'newProducts'));
    }

    public function filter(Request $request){
        $productss = Product::whereNotNull('id')->where('product_status_id', 2);
        if($request->sort == 'new'){
            $productss->orderByDesc('id');
        }
        elseif($request->sort == 'cheap'){
            $productss->orderBy('price');
        }
        elseif($request->sort == 'expensive'){
            $productss->orderByDesc('price');
        }
        if($request->priceFrom){
            $productss->where('price', '>=', $request->priceFrom);
        }
        if($request->priceTo){
            $productss->where('price', '<=', $request->priceTo);
        }
        $store = Store::where('city_id', $request->city)->get('id');
        $productss->whereIn('store_id', $store);
        $products = $productss->get();
        return view('filter', compact('products'));
    }

    public function search(Request $request){
        $products = Product::where(DB::raw('upper(name)'), 'LIKE', '%'.strtoupper($request->q).'%')->where('product_status_id', 2)->get();
        return view('search', compact('products'));
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
}
