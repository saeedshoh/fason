<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeValueController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ImageInv;
use App\Http\Controllers\ItemsForPageController;
use App\Http\Controllers\MonetizationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QrCodeGeneratorController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SmsConfirmedController;
use App\Models\MonetizationCategory;
use BaconQrCode\Encoder\QrCode;

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

Route::group(['middleware' => ['auth', 'checkAdmin'], 'prefix' => 'dashboard',], function () {
    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard.name');
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{id}/update', [RoleController::class, 'update'])->name('roles.update');

    Route::post('products/{product}/publish', [ProductController::class, 'publish'])->name('products.publish');
    Route::post('products/{product}/decline', [ProductController::class, 'decline'])->name('products.decline');
    Route::get('sliders', [BannersController::class, 'sliders'])->name('banners.sliders');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
    Route::resource('products', ProductController::class)->except('store');
    Route::get('attribute/{id}/value', [AttributeValueController::class, 'index'])->name('attr_val.index');
    Route::get('attribute/{id}/value/create',[ AttributeValueController::class, 'create'])->name('attr_val.create');
    Route::post('attribute/{id}/value/store',[ AttributeValueController::class, 'store'])->name('attr_val.store');
    Route::get('attribute/{id}/value/{val_id}/edit', [AttributeValueController::class, 'edit'])->name('attr_val.edit');
    Route::put('attribute/{id}/value/{val_id}', [AttributeValueController::class, 'update'])->name('attr_val.update');
    Route::delete('attribute/{id}/value/{val_id}', [AttributeValueController::class, 'destroy'])->name('attr_val.destroy');
    Route::get('/logs', [CategoryController::class, 'logsIndex'])->name('logs');
    Route::get('clients', [UserController::class, 'clients'])->name('clients.index');
    Route::get('clients/{user}', [UserController::class, 'show'])->name('clients.show');
    Route::get('personalisations', [MonetizationController::class, 'personalisationsIndex'])->name('personalisations.index');
    Route::get('categoryMonetizations', [MonetizationController::class, 'categoryMonetizationsIndex'])->name('categoryMonetizations.index');
    Route::get('/showStoreInfo/{store}', [StoreController::class, 'showStoreInfo'])->name('showStoreInfo');
    Route::resources([
        'orders' => OrderController::class,
        'users' => UserController::class,
        'categories' => CategoryController::class,
        'attributes' => AttributeController::class,
        'stores' => StoreController::class,
        'banners' => BannersController::class,
        'monetizations' => MonetizationController::class,
        'cities' => CityController::class,
    ]);
    Route::post('/acceptOrder/{order}', [OrderController::class, 'acceptOrder'])->name('acceptOrder');
    Route::post('/declineOrder/{order}', [OrderController::class, 'declineOrder'])->name('declineOrder');
    Route::post('/completeOrder/{order}', [OrderController::class, 'completeOrder'])->name('completeOrder');
    Route::get('/ordersStatistic', [BrandController::class, 'ordersStatistic'])->name('ordersStatistic');
    Route::get('/showCategoryMonetization/{monetization}', [MonetizationController::class, 'showCategoryMonetization'])->name('showCategoryMonetization');
    Route::get('/showStoreMonetization/{id}', [MonetizationController::class, 'showStoreMonetization'])->name('showStoreMonetization');
    Route::get('/changeCategoryOrder', [CategoryController::class, 'changeCategoryOrder'])->name('changeCategoryOrder');
    Route::get('editItemsForPage/{itemsForPage}', [ItemsForPageController::class, 'edit'])->name('editItemsForPage');
    Route::put('editItemsForPage/{itemsForPage}', [ItemsForPageController::class, 'update'])->name('updateItemsForPage');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('category/{slug}', [CategoryController::class, 'category'])->name('ft-category.category');
Route::get('/categoryProducts', [CategoryController::class, 'categoryProducts'])->name('categoryProducts');
Route::get('/subcategories', [CategoryController::class, 'subcategories'])->name('subcategories');
Route::get('/getSubcategories', [CategoryController::class, 'getSubcategories'])->name('getSubcategories');
Route::get('/getAttributes', [AttributeController::class, 'attributes'])->middleware('auth')->name('getAttributes');
Route::get('/getAttributesValue', [AttributeController::class, 'attributesValue'])->middleware('auth')->name('getAttributesValue');
Route::get('/getParentcategories', [CategoryController::class, 'getParentcategories'])->name('getParentcategories');
Route::get('/countProducts', [CategoryController::class, 'countProducts'])->name('countProducts');
Route::get('/filter', [HomeController::class, 'filter'])->name('filter');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::resources([
    'favorite' => FavoriteController::class,
]);

Route::get('products/single/{slug}', [ProductController::class, 'single'])->name('ft-products.single');
Route::get('products/add', [ProductController::class, 'add_product'])->name('ft_product.add_product');
// Route::post('products', [ProductController::class, 'ft_store'])->name('ft-products.store');
// Route::put('products/{product}', [ProductController::class, 'ft_update'])->name('ft-products.update');
Route::get('products/edit/{slug}', [ProductController::class, 'editProduct'])->name('ft-products.edit');

Route::get('store/create', [StoreController::class, 'create'])->name('ft-store.create');
Route::get('store/{slug}', [StoreController::class, 'show'])->name('ft-store.show');
Route::get('store/{slug}/guest', [StoreController::class, 'guest'])->name('ft-store.guest');
Route::post('store/store', [StoreController::class, 'store'])->name('ft-store.store');
Route::patch('store/update/{store}', [StoreController::class, 'update'])->name('ft-store.update');
Route::patch('store/toggle/{store}', [StoreController::class, 'toggle'])->name('ft-store.toggle');
Route::get('store/{slug}/edit', [StoreController::class, 'edit'])->name('ft-store.edit');
Route::get('store/salesHistory/{slug}', [StoreController::class, 'salesHistory'])->name('salesHistory');

Route::post('users/contacts', [UserController::class, 'contacts'])->name('users.contacts');

Route::post('orders/store', [OrderController::class, 'store'])->name('ft-order.store');
Route::get('orders', [OrderController::class, 'orders'])->name('ft-order.orders');

Route::get('livesearch', [SearchController::class, 'search'])->name('ft-search.search');

Route::post('sms-send', [SmsConfirmedController::class, 'send'])->name('sms-send');
Route::post('sms-confirmed', [SmsConfirmedController::class, 'confirmed'])->name('sms-confirmed');

Route::get('image', [ImageInv::class, 'index']);
Route::post('/uploadImage', [ImageInv::class, 'uploadImage']);
Route::post('/deleteImage', [ImageInv::class, 'deleteImage']);

Route::view('/delivery', 'useful_links.delivery')->name('useful_links.delivery');
Route::view('/help', 'useful_links.help')->name('useful_links.help');
Route::view('/return', 'useful_links.return')->name('useful_links.return');
Route::view('/saller', 'useful_links.saller')->name('useful_links.saller');
Route::view('/privacy_policy', 'useful_links.privacy_policy')->name('useful_links.privacy_policy');
Route::get('/add_to_favorite', [HomeController::class, 'addToFavorites'])->name('add_to_favorite');
Route::get('store/exist/{name}', [StoreController::class, 'exist'])->name('ft-store.exist');
Route::get('/profile', [UserController::class, 'ft_show'])->name('profile');
Route::post('/profile/update', [UserController::class, 'ft_update'])->name('ft_profile.update');
Route::post('/product/store/test', [ProductController::class, 'test_store'])->name('test_store');
Route::put('/products/edit/test/{product}', [ProductController::class, 'test_update'])->name('test_update');


Route::get('/testJson', function(){
    // echo json_encode(json_encode('2021/01/6013cca9c8ca6480x480.jpg,2021/01/6013ccaa90c3c480x480.jpg,2021/01/6013ccab535d9480x480.jpg,2021/01/6013ccabe5397480x480.jpg,2021/01/6013ccac91749480x480.jpg'));
    echo json_encode('"2021/01/6013cd601d21d480x480.jpg","2021/01/6013cd60b0171480x480.jpg","2021/01/6013cd61429b1480x480.jpg","2021/01/6013cd61ce6fa480x480.jpg","2021/01/6013cd62748b2480x480.jpg","2021/01/6013cd63237e0480x480.jpg"');
});
