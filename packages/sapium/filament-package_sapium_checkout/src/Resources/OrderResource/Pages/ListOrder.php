<?php

namespace Sapium\FilamentPackageSapiumCheckout\Resources\OrderResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Sapium\FilamentPackageSapiumCheckout\Resources\OrderResource;

class ListOrder extends ListRecords
{
    public static string $resource = OrderResource::class;


    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
