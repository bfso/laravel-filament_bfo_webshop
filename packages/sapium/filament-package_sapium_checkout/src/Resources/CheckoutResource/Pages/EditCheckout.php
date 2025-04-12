<?php

namespace Sapium\FilamentPackageSapiumCheckout\Resources\CheckoutResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Sapium\FilamentPackageSapiumCheckout\Resources\CheckoutResource;

class EditCheckout extends EditRecord
{
    protected static string $resource = CheckoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
