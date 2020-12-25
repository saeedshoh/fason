<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ImageInv;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SmsConfirmedController;

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
    Route::post('products/{product}/publish', [ProductController::class, 'publish'])->name('products.publish');
    Route::post('products/{product}/decline', [ProductController::class, 'decline'])->name('products.decline');
    Route::get('sliders', [BannersController::class, 'sliders'])->name('banners.sliders');
    Route::resources([
        'orders' => OrderController::class,
        'users' => UserController::class,
        'categories' => CategoryController::class,
        'products' => ProductController::class,
        'attributes' => AttributeController::class,
        'stores' => StoreController::class,
        'banners' => BannersController::class,
    ]);


});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('category/{slug}', [CategoryController::class, 'category'])->name('ft-category.category');

Route::resources([
    'favorite' => FavoriteController::class,
]);

Route::get('products/single/{slug}', [ProductController::class, 'single'])->name('ft-products.single');
Route::get('products/add', [ProductController::class, 'add_product'])->name('ft_product.add_product');
Route::post('products', [ProductController::class, 'ft_store'])->name('ft-products.store');

Route::get('store/create', [StoreController::class, 'create'])->name('ft-store.create');
Route::get('store/{slug}', [StoreController::class, 'show'])->name('ft-store.show');
Route::get('store/{slug}/guest', [StoreController::class, 'guest'])->name('ft-store.guest');
Route::post('store/store', [StoreController::class, 'store'])->name('ft-store.store');


Route::post('orders/store', [OrderController::class, 'store'])->name('ft-order.store');
Route::get('orders', [OrderController::class, 'orders'])->name('ft-order.orders');

Route::get('livesearch', [SearchController::class, 'search'])->name('ft-search.search');


Route::post('sms-send', [SmsConfirmedController::class, 'send'])->name('sms-send');
Route::post('sms-confirmed', [SmsConfirmedController::class, 'confirmed'])->name('sms-confirmed');

Route::get('image', [ImageInv::class, 'index']);
