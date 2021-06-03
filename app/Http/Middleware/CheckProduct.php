<?php

namespace App\Http\Middleware;

use App\Models\Product;
use App\Models\Store;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckProduct
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $product = Product::withoutGlobalScopes()->where('slug', $request->slug)->first();
        if($product) {
            if($product->store->user->id == Auth::user()->id) {
                return $next($request);
            }
            abort(404);
        }
        abort(404);
    }
}
