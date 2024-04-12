<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/user/{id}', [StoreController::class, 'index']);
Route::get('/store', [StoreController::class, 'index']);
Route::get('/store/product/{id}', [StoreController::class, 'single_product']);
