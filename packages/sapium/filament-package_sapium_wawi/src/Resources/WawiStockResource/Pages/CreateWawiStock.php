<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources\WawiStockResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiStockResource;

class CreateWawiStock extends CreateRecord
{

    public static string $resource = WawiStockResource::class;

    protected function getSavedNotificationTitle(): ?string
    {
        $record = $this->record;
        \Log::info('WawiStock created', ['id' => $record->id, 'product_name' => $record->name]);
        return "Product '{$record->name}' has been updated.";
    }

}
