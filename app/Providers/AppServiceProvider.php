<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

      FilamentAsset::register([
        Css::make('custom-stylesheet', __DIR__ . '/../../resources/css/custom.css'),
    ]);
    }
}
