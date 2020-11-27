<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard',], function () {
    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard.name');
    Route::resources([
        'orders' => OrderController::class,
        'users' => UserController::class,
        'store' => StoreController::class,
        'employee' => EmployeeController::class,
        'categories' => CategoryController::class,
        'products' => ProductController::class,
    ]);
});

Route::view('/product/create', 'products.create')->name('product.create');
Route::view('/store/create', 'store.create')->name('store.open');
Route::view('/', 'index')->name('home');
Route::view('/apply', 'apply');

// Route::resource('categories', Category::class);