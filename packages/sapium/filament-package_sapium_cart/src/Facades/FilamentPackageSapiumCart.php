<?php

namespace Sapium\FilamentPackageSapiumCart\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sapium\FilamentPackageSapiumCart\FilamentPackageSapiumCart
 */
class FilamentPackageSapiumCart extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Sapium\FilamentPackageSapiumCart\FilamentPackageSapiumCart::class;
    }
}
