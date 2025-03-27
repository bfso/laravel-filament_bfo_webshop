<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shop/register', [RegisterController::class, 'showRegistrationForm'])->name('shop.register');
Route::post('/shop/register', [RegisterController::class, 'register']);

Route::middleware(['web'])->group(function () {
    Route::get('/shop/login', [LoginController::class, 'showLoginForm'])->name('shop.login'); // Ensure the route name is 'shop.login'
    Route::post('/shop/login', [LoginController::class, 'login'])->name('shop.login.post'); // Optional: Name the POST route for clarity
    Route::post('/shop/logout', [LoginController::class, 'logout'])->name('filament.shop.auth.logout'); // Correct route name
});
