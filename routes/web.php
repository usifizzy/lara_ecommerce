<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/user/{id}', [StoreController::class, 'index']);
Route::get('/store', [StoreController::class, 'index']);
Route::get('/store/product/{id}', [StoreController::class, 'single_product']);


Route::get('/admin/products', [AdminController::class, 'products']);
Route::get('/admin/customers', [AdminController::class, 'customers']);
Route::get('/admin/orders', [AdminController::class, 'orders']);
Route::get('/admin/order/details', [AdminController::class, 'order_details']);
