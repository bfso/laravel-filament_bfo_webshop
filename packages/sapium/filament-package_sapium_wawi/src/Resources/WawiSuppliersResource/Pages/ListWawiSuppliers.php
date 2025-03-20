<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources\WawiSuppliersResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiSuppliersResource;

class ListWawiSuppliers extends ListRecords
{
    public static string $resource = WawiSuppliersResource::class;


    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
