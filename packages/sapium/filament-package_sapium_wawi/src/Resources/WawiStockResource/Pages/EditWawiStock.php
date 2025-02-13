<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources\WawiStockResource\Pages;


use Filament\Resources\Pages\EditRecord;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiStockResource;

class EditWawiStock extends EditRecord
{
    public static string $resource = WawiStockResource::class;

    protected function getSavedNotificationTitle(): ?string
    {
        $record = $this->record;
        \Log::info('WawiStock edited', ['id' => $record->id, 'product_name' => $record->name]);
        return "Product '{$record->name}' has been updated.";
    }

}
