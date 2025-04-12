<?php

namespace App\Filament\Shop\Resources\CheckoutResource\Pages;

use App\Filament\Shop\Resources\CheckoutResource;
use Filament\Forms\Form;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Placeholder;

class CheckoutConfirmationPage extends Page
{
    protected static string $resource = CheckoutResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Placeholder::make("thanks")
                ->label("Besten Dank für Ihre Bestellung.")
                ->content("Erwägen Sie, wieder einzukaufen")
            ]);
    }
}
