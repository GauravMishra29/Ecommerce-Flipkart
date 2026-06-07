<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OfferController;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [ShopController::class, 'home']);
Route::get('/product/{id}', [ShopController::class, 'product']);
Route::get('/category/{category}', [ShopController::class, 'category']);
Route::get('/search', [ShopController::class, 'search']);
Route::get('/cart', [ShopController::class, 'cart']);
Route::get('/add-to-cart/{id}', [ShopController::class, 'addToCart']);
Route::get('/remove-from-cart/{id}', [ShopController::class, 'removeFromCart']);
Route::get('/address', [ShopController::class, 'address']);
Route::post('/place-order', [ShopController::class, 'yourOrders']);
// Route::view('/login', 'login');
// Route::view('/register', 'register');

/*
|--------------------------------------------------------------------------
| ADMIN PRODUCT CRUD
|--------------------------------------------------------------------------
*/
Route::middleware('admin')->group(function () {

    Route::resource('products', ProductController::class);

});

Route::get('/admin/login', [AdminController::class, 'login']);

Route::post('/admin/login', [AdminController::class, 'authenticate']);

Route::get('/admin/logout', [AdminController::class, 'logout']);

Route::get('/login', [AuthController::class, 'login']);

Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/register', [AuthController::class, 'register']);

Route::post('/register', [AuthController::class, 'storeRegister']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/increase-cart/{id}', [ShopController::class, 'increaseCart']);
Route::get('/decrease-cart/{id}', [ShopController::class, 'decreaseCart']);


Route::get('/offers', [OfferController::class,'index']);

Route::get('/admin/offers', [OfferController::class,'create']);

Route::post('/admin/offers/store', [OfferController::class,'store'])
        ->name('offers.store');




Route::get('/admin/offers', [OfferController::class,'indexAdmin'])
        ->name('offers.index');

Route::get('/admin/offers/create', [OfferController::class,'create'])
        ->name('offers.create');

Route::post('/admin/offers/store', [OfferController::class,'store'])
        ->name('offers.store');

Route::get('/admin/offers/edit/{id}', [OfferController::class,'edit'])
        ->name('offers.edit');

Route::post('/admin/offers/update/{id}', [OfferController::class,'update'])
        ->name('offers.update');

Route::get('/admin/offers/delete/{id}', [OfferController::class,'delete'])
        ->name('offers.delete');