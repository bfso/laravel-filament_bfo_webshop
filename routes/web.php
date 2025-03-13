<?php

use App\Filament\Shop\Resources\CheckoutResource\Pages\CheckoutConfirmationPage;
use App\Http\Livewire\CheckoutForm;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('', CheckoutConfirmationPage::class)->name('filament.pages.checkout-confirmation-page');
