<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources\WawiCategoriesResource\Pages;


use Filament\Resources\Pages\EditRecord;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiCategoriesResource;

class EditWawiCategories extends EditRecord
{
    public static string $resource = WawiCategoriesResource::class;

    protected function getSavedNotificationTitle(): ?string
    {
        $record = $this->record;
        \Log::info('WawiCategories edited', ['id' => $record->id, 'product_name' => $record->name]);
        return "Categories has been updated.";
    }

}
