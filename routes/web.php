<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\ItemsForPageController;
use App\Http\Controllers\MonetizationController;
use App\Http\Controllers\SmsConfirmedController;
use App\Http\Controllers\AttributeValueController;

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

Route::group(['middleware' => 'checkAdmin', 'prefix' => 'dashboard',], function () {
    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard.name');
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{id}/update', [RoleController::class, 'update'])->name('roles.update');

    Route::post('products/{product}/publish', [ProductController::class, 'publish'])->name('products.publish');
    Route::post('products/{product}/decline', [ProductController::class, 'decline'])->name('products.decline');
    Route::get('products/statuses/accepted', [ProductController::class, 'accepted'])->name('products.accepted');
    Route::get('products/statuses/notInStock', [ProductController::class, 'notInStock'])->name('products.notInStock');
    Route::get('products/statuses/canceled', [ProductController::class, 'canceled'])->name('products.canceled');
    Route::get('products/statuses/hidden', [ProductController::class, 'hidden'])->name('products.hidden');
    Route::get('products/statuses/onCheck', [ProductController::class, 'onCheck'])->name('products.onCheck');
    Route::get('products/statuses/deleted', [ProductController::class, 'deleted'])->name('products.deleted');

    Route::get('orders/statuses/accepted', [OrderController::class, 'accepted'])->name('orders.accepted');
    Route::get('orders/statuses/onTheWay', [OrderController::class, 'onTheWay'])->name('orders.onTheWay');
    Route::get('orders/statuses/onCheck', [OrderController::class, 'onCheck'])->name('orders.onCheck');
    Route::get('orders/statuses/canceled', [OrderController::class, 'canceled'])->name('orders.canceled');
    Route::get('orders/statuses/returns', [OrderController::class, 'returns'])->name('orders.returns');

    Route::get('sliders', [BannersController::class, 'sliders'])->name('banners.sliders');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
    Route::resource('products', ProductController::class)->except('store');

    Route::get('attribute/{id}/value', [AttributeValueController::class, 'index'])->name('attr_val.index');
    Route::get('attribute/{id}/value/create', [AttributeValueController::class, 'create'])->name('attr_val.create');
    Route::post('attribute/{id}/value/store', [AttributeValueController::class, 'store'])->name('attr_val.store');
    Route::get('attribute/{id}/value/{val_id}/edit', [AttributeValueController::class, 'edit'])->name('attr_val.edit');
    Route::put('attribute/{id}/value/{val_id}', [AttributeValueController::class, 'update'])->name('attr_val.update');
    Route::delete('attribute/{id}/value/{val_id}', [AttributeValueController::class, 'destroy'])->name('attr_val.destroy');
    Route::get('/logs', [CategoryController::class, 'logsIndex'])->name('logs');
    Route::get('clients', [UserController::class, 'clients'])->name('clients.index');
    Route::get('clients/{user}', [UserController::class, 'show'])->name('clients.show');
    Route::post('clients/changeAddress', [UserController::class, 'changeAddress']);
    Route::get('personalisations', [MonetizationController::class, 'personalisationsIndex'])->name('personalisations.index');
    Route::get('categoryMonetizations', [MonetizationController::class, 'categoryMonetizationsIndex'])->name('categoryMonetizations.index');
    Route::get('/stores/showStoreInfo/{store}', [StoreController::class, 'showStoreInfo'])->name('showStoreInfo');
    Route::get('/stores/showStoreInfo/{store}/edit', [StoreController::class, 'profile_edit'])->name('store.profile_edit');
    Route::get('/show/{store}/orders', [StoreController::class, 'profile_orders'])->name('store.profile_orders');
    Route::get('/show/{store}/products', [StoreController::class, 'profile_products'])->name('store.profile_products');
    Route::get('/stores/accepted', [StoreController::class, 'accepted'])->name('stores.accepted');
    Route::get('/stores/moderation', [StoreController::class, 'moderation'])->name('stores.moderation');
    Route::get('/stores/disabled', [StoreController::class, 'disabled'])->name('stores.disabled');
    Route::get('/stores/disabledUser', [StoreController::class, 'disabledUser'])->name('stores.disabledUser');
    Route::get('/stores/starred', [StoreController::class, 'starred'])->name('stores.starred');
    Route::patch('store/toggle/{store}', [StoreController::class, 'toggle'])->name('ft-store.toggle');
    Route::patch('store/star/{id}', [StoreController::class, 'star'])->name('ft-store.star');

    Route::get('/ordersStatistic', [OrderController::class, 'statistics'])->name('ordersStatistic');
    Route::get('categories/inactives', [CategoryController::class, 'inactive'])->name('categories.inactive');
    Route::get('categories/actives', [CategoryController::class, 'active'])->name('categories.active');
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
    Route::post('/returnsOrder/{order}', [OrderController::class, 'returnsOrder'])->name('returnsOrder');
    Route::post('/completeOrder/{order}', [OrderController::class, 'completeOrder'])->name('completeOrder');
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
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::middleware('client')->group(function () {

    Route::middleware(['checkStore'])->group(function () {
        Route::get('store/{slug}/show', [StoreController::class, 'show'])->name('ft-store.show');
        Route::get('store/salesHistory/{slug}', [StoreController::class, 'salesHistory'])->name('salesHistory');
        Route::get('store/{slug}/edit', [StoreController::class, 'edit'])->name('ft-store.edit');
    });
    Route::middleware(['checkProduct'])->group(function () {
        Route::get('products/edit/{slug}', [ProductController::class, 'editProduct'])->name('ft-products.edit');
    });

    Route::patch('store/toggle/{store}', [StoreController::class, 'toggleUser'])->name('ft-store.toggleUser');
    Route::patch('store/update/{store}', [StoreController::class, 'update']);
    Route::post('store/store', [StoreController::class, 'store'])->name('ft-store.store');
    Route::get('store/create', [StoreController::class, 'create'])->name('ft-store.create');
    Route::get('store/exist/{name}', [StoreController::class, 'exist'])->name('ft-store.exist');

    Route::put('/products/edit/test/{product}', [ProductController::class, 'test_update']);
    Route::post('/product/store/test', [ProductController::class, 'test_store']);
    Route::get('products/add', [ProductController::class, 'add_product'])->name('ft_product.add_product');
    Route::post('/products/cancelDestroy/{product}', [ProductController::class, 'cancelDestroy'])->name('ft_product.cancelDestroy');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('ft_product.destroy');

    Route::post('orders/store', [OrderController::class, 'store'])->name('ft-order.store');
    Route::get('orders', [OrderController::class, 'orders'])->name('ft-order.orders');
    Route::get('orders/single/{order}', [OrderController::class, 'single'])->name('ft-order.single');
    Route::get('/add_to_favorite', [HomeController::class, 'addToFavorites'])->name('add_to_favorite');

    Route::get('/profile', [UserController::class, 'ft_show'])->name('profile');
    Route::post('/profile/update', [UserController::class, 'ft_update'])->name('ft_profile.update');

    Route::resource('favorite', FavoriteController::class);
});

Route::middleware('checkAdmin')->group(function() {
    Route::put('/dashboard/products/edit/test/{product}', [ProductController::class, 'test_update'])->name('test_update');
    Route::post('/dashboard/product/store/test', [ProductController::class, 'test_store'])->name('test_store');
    Route::patch('/dashboard/store/update/{store}', [StoreController::class, 'update'])->name('ft-store.update');
});

Route::get('store/{slug}/guest', [StoreController::class, 'guest'])->name('ft-store.guest');

Route::get('products/single/{slug}', [ProductController::class, 'single'])->name('ft-products.single');

Route::get('livesearch', [SearchController::class, 'search'])->name('ft-search.search');

Route::post('sms-send', [SmsConfirmedController::class, 'send'])->name('sms-send');
Route::post('sms-confirmed', [SmsConfirmedController::class, 'confirmed'])->name('sms-confirmed');

Route::view('/delivery', 'useful_links.delivery')->name('useful_links.delivery');
Route::view('/help', 'useful_links.help')->name('useful_links.help');
Route::view('/return', 'useful_links.return')->name('useful_links.return');
Route::view('/saller', 'useful_links.saller')->name('useful_links.saller');
Route::view('/privacy_policy', 'useful_links.privacy_policy')->name('useful_links.privacy_policy');
Route::get('/moderation/{slug}', [StoreController::class, 'usefulLinks']);

Route::post('users/contacts', [UserController::class, 'contacts'])->name('users.contacts');

Route::get('/stores', [StoreController::class, 'stores'])->name('stores');

Route::post('/monetization_price', [MonetizationController::class, 'price']);

Route::post('stores/order', [StoreController::class, 'order']);
 