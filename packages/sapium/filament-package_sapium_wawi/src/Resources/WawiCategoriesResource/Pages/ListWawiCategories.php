<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources\WawiCategoriesResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiCategoriesResource;

class ListWawiCategories extends ListRecords
{
    public static string $resource = WawiCategoriesResource::class;


    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
