<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources\WawiSupplierResource\Pages;


use Filament\Resources\Pages\EditRecord;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiSupplierResource;

class EditWawiSupplier extends EditRecord
{
    public static string $resource = WawiSupplierResource::class;

    protected function getSavedNotificationTitle(): ?string
    {
        $record = $this->record;
        \Log::info('WawiSupplier edited', ['id' => $record->id, 'product_name' => $record->name]);
        return "Supplier has been updated.";
    }

}
