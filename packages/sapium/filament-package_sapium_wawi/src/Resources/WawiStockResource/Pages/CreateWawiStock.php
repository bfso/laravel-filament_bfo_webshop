<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources\WawiStockResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiStockResource;

class CreateWawiStock extends CreateRecord
{


    public static string $resource = WawiStockResource::class;
    protected static string $resources = WawiStockResource::class;
    
    protected function getRedirectUrl(): string{
        return WawiStockResource::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        $record = $this->record;
        \Log::info('WawiStock created', ['id' => $record->id, 'product_name' => $record->name]);
        return "Stock has been updated.";
    }

}
