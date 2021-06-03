<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $back = url()->previous();
        $favorites = Favorite::where('user_id', Auth::id())->where('status', 1)->get();
        return view('favorite', compact('favorites', 'back'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            Favorite::updateOrCreate(['product_id' => $request->product_id], ['user_id' => Auth::id(), 'product_id' => $request->product_id, 'status' => $request->status]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        if ($request->ajax()) {
            Favorite::updateOrCreate(['product_id' => $request->product_id], ['user_id' => Auth::id(), 'product_id' => $request->product_id, 'status' => $request->status]);
        }
    }
}
