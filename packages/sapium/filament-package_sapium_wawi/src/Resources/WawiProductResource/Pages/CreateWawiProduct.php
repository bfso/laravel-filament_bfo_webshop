<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources\WawiProductResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiProductResource;

class CreateWawiProduct extends CreateRecord
{

    public static string $resource = WawiProductResource::class;

    protected function getSavedNotificationTitle(): ?string
    {
        $record = $this->record;
        \Log::info('WawiProduct created', ['id' => $record->id, 'product_name' => $record->name]);
        return "Product '{$record->name}' has been updated.";
    }

}
