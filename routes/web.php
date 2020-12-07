<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SmsConfirmedController;
use App\Http\Controllers\SMSController;

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
        'employee' => EmployeeController::class,
        'categories' => CategoryController::class,
        'products' => ProductController::class,
        'attributes' => AttributeController::class,
        'stores' => StoreController::class,
    ]);
});
Route::view('/product/create', 'products.create')->name('product.create');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/apply', 'apply');
Route::get('/product/{name}', [ProductController::class, 'single'])->name('product.single');
Route::get('/product/create', [ProductController::class, 'ft_create'])->name('product.ft_create');
Route::get('/store/create', [StoreController::class, 'create'])->name('ft-store.create');
Route::get('/store/{id}/edit', [StoreController::class, 'edit'])->name('ft-store.edit');
Route::post('/store/store', [StoreController::class, 'store'])->name('ft-store.store');

Route::post('sms-send', [SmsConfirmedController::class, 'send'])->name('sms-send');
Route::post('sms-confirmed', [SmsConfirmedController::class, 'confirmed'])->name('sms-confirmed');