<?php

namespace Sapium\FilamentPackageSapiumWawi;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiProductResource;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiStockResource;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiCategoriesResource;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiSuppliersResource;

class WawiPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public static function translate($path): string
    {
        return __('filament-package_sapium_wawi::' . $path);
    }

    public function boot(Panel $panel): void
    {
    }

    public function getId(): string
    {
        return 'wawi';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                WawiCategoriesResource:: class,
                WawiProductResource::class,
                WawiStockResource::class,
                WawiSuppliersResource::class
            ]);
    }
}
