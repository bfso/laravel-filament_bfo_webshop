<?php

namespace Sapium\FilamentPackageSapiumCheckout;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Sapium\FilamentPackageSapiumCheckout\Resources\OrderResource;

class CheckoutPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public static function translate($path): string
    {
        return __('filament-package_sapium_checkout::' . $path);
    }

    public function boot(Panel $panel): void
    {
    }

    public function getId(): string
    {
        return 'checkout';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                OrderResource::class,
            ]);
    }
}
