<?php

namespace App\Providers;

use App\Models\Banners;
use App\Models\Store;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        if (Schema::hasTable('banners')) {
            $header_banner = Banners::where('type', 2)->where('position', 1)->latest()->first();
            $is_store = null;
            if (Auth::check()) {
                $is_store = $this->stores->where('user_id', Auth::id())->withoutGlobalScopes()->first();
            }
            if($header_banner){
                // $is_store = null;
                // if (Auth::check()) {
                //     $is_store = $this->stores->where('user_id', Auth::id())->withoutGlobalScopes()->first();
                // }
                view()->share(['is_store' => $is_store, 'header_banner' => $header_banner]);
            }
            else{
                // $is_store = null;
                // if (Auth::check()) {
                //     $is_store = $this->stores->where('user_id', Auth::id())->withoutGlobalScopes()->first();
                // }
                view()->share(['is_store' => $is_store]);
            }
        }

        view()->composer(
            ['layouts.header','home', 'products.*', 'favorite', 'dashboard.layouts.aside'],
            function ($view) {
                $is_store = null;
                if (Auth::check()) {
                    $is_store = Store::with('orders')->where('user_id', Auth::id())->withoutGlobalScopes()->first();
                }
                $newProducts = Product::withoutGlobalScopes()->where('product_status_id', 1)->count();
                $newOrders = Order::withoutGlobalScopes()->where('order_status_id', 1)->count();
                $newStores = Store::withoutGlobalScopes()->where('is_active', 0)->count();
                $view->with([
                    'is_store' => $is_store,
                    'newProducts' => $newProducts,
                    'newOrders' =>  $newOrders,
                    'newStores' => $newStores
                ]);
            }
        );
    }
}
