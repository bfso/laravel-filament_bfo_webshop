<?php

namespace Sapium\FilamentPackageSapiumCheckout\Resources;


use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Sapium\FilamentPackageSapiumCheckout\Models\Order;
use Sapium\FilamentPackageSapiumCheckout\Resources\OrderResource\Pages\CreateOrder;
use Sapium\FilamentPackageSapiumCheckout\Resources\OrderResource\Pages\EditOrder;
use Sapium\FilamentPackageSapiumCheckout\Resources\OrderResource\Pages\ListOrder;

class OrderResource extends Resource
{

    protected static ?string $model = Order::class;
    protected static ?string $navigationIcon = 'heroicon-o-cursor-arrow-ripple';

    public static function form(Form $form): Form
    {
        $formComponents = [
            TextInput::make('id'),
        ];

        return $form->schema($formComponents);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOrder::route('/'),
            'create' => CreateOrder::route('/create'),
            'edit' => EditOrder::route('/{record}/edit'),
        ];
    }

    public static function table(Table $table): Table
    {
        $tableComponents = [
            TextColumn::make('id')
        ];

        return $table
            ->columns($tableComponents)
            ->filters([])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make()
            ]);
    }
}
