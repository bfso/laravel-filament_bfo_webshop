<?php

namespace Sapium\FilamentPackageSapiumWawi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sapium\FilamentPackageSapiumWawi\FilamentPackageSapiumWawi
 */
class FilamentPackageSapiumWawi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Sapium\FilamentPackageSapiumWawi\FilamentPackageSapiumWawi::class;
    }
}
