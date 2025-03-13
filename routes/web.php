<?php

use Illuminate\Support\Facades\Route;
use Sapium\FilamentPackageSapiumWawi\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/v1/products', [ProductController::class, 'index']);
