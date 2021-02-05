<?php

namespace App\Providers;

use App\Models\Banners;
use App\Models\Store;
use App\Models\Order;
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
            if($header_banner){
                $is_store = null;
                if (Auth::check()) {
                    $is_store = $this->stores->where('user_id', Auth::id())->first();
                }
                view()->share(['is_store' => $is_store, 'header_banner' => $header_banner]);
            }
        }

        view()->composer(
            ['layouts.header','home', 'products.*', 'favorite'],
            function ($view) {
                $is_store = null;
                if (Auth::check()) {
                    $is_store = Store::with('orders')->where('user_id', Auth::id())->first();
                }
                $view->with(['is_store' => $is_store]);
            }
        );
    }
}
