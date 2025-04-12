<?php

use App\Filament\Shop\Resources\CheckoutResource\Pages\CheckoutConfirmationPage;
use App\Http\Livewire\CheckoutForm;
use Illuminate\Support\Facades\Route;
use Sapium\FilamentPackageSapiumWawi\Controllers\ProductController;
use App\Http\Controllers\ProductSyncController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/v1/products', [ProductController::class, 'index']);
Route::get('confirmation', CheckoutConfirmationPage::class)->name('filament.pages.checkout-confirmation-page');
Route::post('/admin/products/sync', [ProductSyncController::class, 'sync'])->name('admin.products.sync');