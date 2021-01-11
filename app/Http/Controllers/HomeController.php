<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Monetization;
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
        $this->monetizations = Monetization::get();
    }
    public function dashboard() {
        return view('dashboard.home');
    }

    public function index(Request $request)
    {
        $stores = $this->stores;
        $categories = $this->categories->where('parent_id', 0);
        $sliders = $this->banners->where('type', 1);
        $middle_banner = $this->banners->where('type', 2)->where('position', 2)->first();
        $monetizations = $this->monetizations;

        $countProd = Order::select('product_id', DB::raw('count(product_id) as countProd'))
            ->groupBy('product_id');

        $topProducts = Product::where('product_status_id', 2)
            ->select(DB::raw('products.*, countProd.countProd'))
            ->leftJoinSub($countProd, 'countProd', function ($join) {
                $join->on('products.id', '=', 'countProd.product_id');
            })->orderByDesc('countProd')->paginate(15);
        $newProducts = Product::where('product_status_id', 2)->orderByDesc('updated_at')->paginate(15);
        return view('home', compact('stores', 'categories', 'sliders', 'middle_banner', 'topProducts', 'newProducts', 'monetizations'));
    }

    public function filter(Request $request)
    {
        $back = url()->previous();
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
        return view('filter', compact('products', 'back'));
    }

    public function search(Request $request)
    {
        $back = url()->previous();
        $products = Product::where(DB::raw('upper(name)'), 'LIKE', '%'.strtoupper($request->q).'%')->where('product_status_id', 2)->get();
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

    public function addToFavorites(Request $request){
        $user_id = Auth::user()->id;
        $exist = Favorite::where('product_id', $request->product_id)
            ->where('user_id', $user_id)
            ->first();
        if($exist){
            $exist->update([
                'user_id' => $user_id,
                'product_id' => $request->product_id,
                'status'    => $exist->status == 1 ? 0 : 1
            ]);
        }
        else{
            Favorite::updateOrCreate([
                'user_id' => $user_id,
                'product_id' => $request->product_id,
                'status'    => $request->status
            ]);
        }
        return response()->json(['status' => 'Добавлено']);
    }
}
