<?php

use Illuminate\Support\Facades\Route;
use Sapium\FilamentPackageSapiumCart\Http\Controllers\CartController;

Route::patch('/cart/{cart}/quantity', [CartController::class, 'updateQuantity']);
