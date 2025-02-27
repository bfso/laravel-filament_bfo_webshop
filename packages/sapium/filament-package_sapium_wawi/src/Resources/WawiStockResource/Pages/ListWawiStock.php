<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources\WawiStockResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiStockResource;

class ListWawiStock extends ListRecords
{
    public static string $resource = WawiStockResource::class;


    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
