<?php

use App\Filament\Shop\Resources\CheckoutResource\Pages\CheckoutConfirmationPage;
use App\Http\Livewire\CheckoutForm;
use Illuminate\Support\Facades\Route;
use Sapium\FilamentPackageSapiumWawi\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/v1/products', [ProductController::class, 'index']);

Route::get('', CheckoutConfirmationPage::class)->name('filament.pages.checkout-confirmation-page');

Route::get('', CheckoutConfirmationPage::class)->name('filament.pages.checkout-confirmation-page');
Route::get('/v1/products', [ProductController::class, 'index']);