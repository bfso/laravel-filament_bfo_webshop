<?php

namespace Sapium\FilamentPackageSapiumCheckout\Resources\CheckoutResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Sapium\FilamentPackageSapiumCheckout\Resources\CheckoutResource;

class ListCheckouts extends ListRecords
{
    protected static string $resource = CheckoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public static function canAccess(array $parameters = []): bool {
        redirect(to: CheckoutResource::getUrl('create'));
        return true;
    }
}
