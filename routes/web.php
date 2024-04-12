<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/user/{id}', [StoreController::class, 'index']);
Route::get('/store', [StoreController::class, 'index']);
Route::get('/store/product/{id}', [StoreController::class, 'single_product']);


Route::get('/cart', [CartController::class, 'show_cart']);
Route::post('/store/cart/add', [CartController::class, 'add_item']);
Route::post('/store/cart/update', [CartController::class, 'update_item']);
Route::get('/store/cart/remove/{id}', [CartController::class, 'remove_item']);
Route::get('/store/cart/empty', [CartController::class, 'empty_cart']);
Route::get('/cart/checkout', [CartController::class, 'checkout']);
Route::get('/cart/checkout/order', [CartController::class, 'place_order']);


Route::get('/admin/products', [AdminController::class, 'products']);
Route::get('/admin/customers', [AdminController::class, 'customers']);
Route::get('/admin/orders', [AdminController::class, 'orders']);
Route::get('/admin/order/details', [AdminController::class, 'order_details']);
