<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources\WawiSuppliersResource\Pages;


use Filament\Resources\Pages\EditRecord;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiSuppliersResource;

class EditWawiSuppliers extends EditRecord
{
    public static string $resource = WawiSuppliersResource::class;

    protected function getSavedNotificationTitle(): ?string
    {
        $record = $this->record;
        \Log::info('WawiSuppliers edited', ['id' => $record->id, 'product_name' => $record->name]);
        return "Suppliers has been updated.";
    }

}
