<?php

namespace Sapium\FilamentPackageSapiumCart\Resources\CartItemResource\Pages;

use Sapium\FilamentPackageSapiumCart\Resources\CartItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCartItems extends ListRecords
{
    protected static string $resource = CartItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
