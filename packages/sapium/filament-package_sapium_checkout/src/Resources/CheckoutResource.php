<?php

namespace Sapium\FilamentPackageSapiumCheckout\Resources;

use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Sapium\FilamentPackageSapiumCheckout\Models\Checkout;
use Sapium\FilamentPackageSapiumCheckout\Resources\CheckoutResource\Pages\CheckoutConfirmationPage;
use Sapium\FilamentPackageSapiumCheckout\Resources\CheckoutResource\Pages\CreateCheckout;
use Sapium\FilamentPackageSapiumCheckout\Resources\CheckoutResource\Pages\EditCheckout;
use Sapium\FilamentPackageSapiumCheckout\Resources\CheckoutResource\Pages\ListCheckouts;

class CheckoutResource extends Resource
{
    protected static ?string $model = Checkout::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'Checkout';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCheckouts::route('/'),
            'create' => CreateCheckout::route('/create'),
            'edit' => EditCheckout::route('/{record}/edit'),
            'confirm' => CheckoutConfirmationPage::route('/confirm')
        ];
    }
}
