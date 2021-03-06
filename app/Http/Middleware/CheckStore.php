<?php

namespace App\Http\Middleware;

use App\Models\Store;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckStore
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
        $store = Store::withoutGlobalScopes()->where('slug', $request->slug)->first();
        if($store) {
            if($store->user->id == Auth::user()->id) {
                return $next($request);
            }
            abort(404);
        }
        abort(404);
    }
}
