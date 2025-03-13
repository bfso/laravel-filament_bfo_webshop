<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources\WawiCategoriesResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiCategoriesResource;

class CreateWawiCategories extends CreateRecord
{


    public static string $resource = WawiCategoriesResource::class;
    protected static string $resources = WawiCategoriesResource::class;
    
    protected function getRedirectUrl(): string{
        return WawiCategoriesResource::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        $record = $this->record;
        \Log::info('WawiCategories created', ['id' => $record->id, 'product_name' => $record->name]);
        return "Categories has been updated.";
    }

}
