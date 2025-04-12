<?php

namespace Sapium\FilamentPackageSapiumCheckout\Resources\CheckoutResource\Pages;

use Filament\Forms\Form;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Placeholder;
use Sapium\FilamentPackageSapiumCheckout\Resources\CheckoutResource;

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
