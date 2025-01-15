<?php

namespace Sapium\FilamentPackageSapiumCart;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Sapium\FilamentPackageSapiumCart\Resources\CartResource;

class CartPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public static function translate($path): string
    {
        return __('filament-package_sapium_cart::' . $path);
    }

    public function boot(Panel $panel): void
    {
    }

    public function getId(): string
    {
        return 'cart';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                CartResource::class,
            ]);
    }
}
