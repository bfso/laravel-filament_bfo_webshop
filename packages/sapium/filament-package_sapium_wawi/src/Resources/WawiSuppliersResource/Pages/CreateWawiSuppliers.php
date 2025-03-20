<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources\WawiSuppliersResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiSuppliersResource;

class CreateWawiSuppliers extends CreateRecord
{


    public static string $resource = WawiSuppliersResource::class;
    protected static string $resources = WawiSuppliersResource::class;
    
    protected function getRedirectUrl(): string{
        return WawiSuppliersResource::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        $record = $this->record;
        \Log::info('WawiSuppliers created', ['id' => $record->id, 'product_name' => $record->name]);
        return "Suppliers has been updated.";
    }

}
