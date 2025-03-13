<?php

use Illuminate\Support\Facades\Route;
use Sapium\FilamentPackageSapiumCart\Http\Controllers\CartController;
use Sapium\FilamentPackageSapiumWawi\Controllers\ProductController;


Route::get('/v1/products', [ProductController::class, 'index']);

Route::patch('/cart/{cart}/quantity', [CartController::class, 'updateQuantity']);
Route::group(['prefix' => 'v1'], function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::patch('/cart/{cart}/quantity', [CartController::class, 'updateQuantity']);
});