<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources\WawiSupplierResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiSupplierResource;

class ListWawiSupplier extends ListRecords
{
    public static string $resource = WawiSupplierResource::class;


    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
