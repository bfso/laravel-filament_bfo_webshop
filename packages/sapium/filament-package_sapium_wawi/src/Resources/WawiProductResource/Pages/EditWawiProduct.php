<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources\WawiProductResource\Pages;


use Filament\Resources\Pages\EditRecord;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiProductResource;

class EditWawiProduct extends EditRecord
{
    public static string $resource = WawiProductResource::class;

    protected function getSavedNotificationTitle(): ?string
    {
        $record = $this->record;
        \Log::info('WawiProduct edited', ['id' => $record->id, 'product_name' => $record->name]);
        return "Product has been updated.";
    }
    protected function getRedirectUrl(): string{
        return WawiProductResource::getUrl('index');
    }

}
