<?php

namespace Sapium\FilamentPackageSapiumCheckout\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sapium\FilamentPackageSapiumCheckout\FilamentPackageSapiumCheckout
 */
class FilamentPackageSapiumCheckout extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Sapium\FilamentPackageSapiumCheckout\FilamentPackageSapiumCheckout::class;
    }
}
