<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request, Product $product)
    {
        if ($request->ajax()) {
            $products = $product->where('name', 'LIKE', '%' . $request->value . '%')->take(7)->get();
            return view('ajax.livesearch', compact('products'))->render();
        }
    }
}
