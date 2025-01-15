<?php

namespace Sapium\FilamentPackageSapiumCart\Resources\CartResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Sapium\FilamentPackageSapiumCart\Resources\CartResource;

class ListCart extends ListRecords
{
    public static string $resource = CartResource::class;


    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
