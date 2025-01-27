<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources\WawiProductResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiProductResource;

class ListWawiProduct extends ListRecords
{
    public static string $resource = WawiProductResource::class;


    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
