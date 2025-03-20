<?php

use Illuminate\Support\Facades\Route;
use Sapium\FilamentPackageSapiumCart\Http\Controllers\CartController;
use Sapium\FilamentPackageSapiumWawi\Controllers\ProductController;

// Funktioniert im Moment nicht
// Route::get('/v1/products', [ProductController::class, 'index']);

Route::patch('/cart/{cart}/quantity', [CartController::class, 'updateQuantity']);