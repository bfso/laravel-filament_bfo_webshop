<?php

use App\Http\Livewire\CheckoutForm;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/checkout', function () {
    return view('checkoutForm');
});   */

Route::get('/checkout', function () {
    return view('checkoutForm');
});