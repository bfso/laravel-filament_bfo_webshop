<?php

namespace App\Filament\Shop\Resources\CheckoutResource\Pages;

use App\Filament\Shop\Resources\CheckoutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Widgets\StatsOverviewWidget\Stat;

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
