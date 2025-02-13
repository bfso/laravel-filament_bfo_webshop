<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources\WawiProductResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiProductResource;
use Filament\Actions\CreateAction;

class CreateWawiProduct extends CreateRecord
{

    public static string $resource = WawiProductResource::class;
    protected static string $resources = WawiProductResource::class;
    
    protected function getRedirectUrl(): string{
        return WawiProductResource::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        $record = $this->record;
        \Log::info('WawiProduct created', ['id' => $record->id, 'product_name' => $record->product_name]);
        return "Product has been updated.";
    }

}
