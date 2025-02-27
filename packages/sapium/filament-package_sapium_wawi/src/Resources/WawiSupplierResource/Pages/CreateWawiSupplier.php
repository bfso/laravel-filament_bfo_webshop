<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources\WawiSupplierResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiSupplierResource;
use Filament\Actions\CreateAction;

class CreateWawiSupplier extends CreateRecord
{

    public static string $resource = WawiSupplierResource::class;
    protected static string $resources = WawiSupplierResource::class;
    
    protected function getRedirectUrl(): string{
        return WawiSupplierResource::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        $record = $this->record;
        \Log::info('WawiSupplier created', ['id' => $record->id, 'product_name' => $record->product_name]);
        return "Supplier has been updated.";
    }

}
