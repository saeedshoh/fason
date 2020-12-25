<?php

namespace App\Providers;

use App\Models\Banners;
use App\Models\Store;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
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
        $header_banner = Banners::where('type', 2)->where('position', 1)->latest()->first();
        $is_store = null;
        view()->share(['is_store' => $is_store, 'header_banner' => $header_banner]);
    }
}
