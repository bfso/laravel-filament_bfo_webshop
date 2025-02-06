<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('export-products', [ProductController::class, 'exportToJson']);

Route::get('/', function () {
    return view('welcome');
});
