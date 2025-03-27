<?php

namespace Sapium\FilamentPackageSapiumCart\Resources;

use Sapium\FilamentPackageSapiumCart\Resources\CartItemResource\Pages\ListCartItems;
use Filament\Forms;
use Filament\Forms\Form;
use Sapium\FilamentPackageSapiumCart\Models\CartItem;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CartItemResource extends Resource
{
    protected static ?string $model = CartItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Cart';
    protected static ?string $pluralModelLabel = 'Cart';

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
            ->modifyQueryUsing(function (Builder $query) {
                return $query->with('product');
            }) // Stellt sicher, dass 'product' geladen wird
            ->columns([
                TextColumn::make('product.title')
                    ->label('Produktname')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('product.price')
                    ->label('Preis')
                    ->money('CHF')
                    ->sortable(),

                TextColumn::make('quantity')
                    ->label('Menge')
                    ->sortable(),

                TextColumn::make('total_price')
                    ->label('Totalpreis')
                    ->money('CHF')
                    ->sortable()
                    ->formatStateUsing(fn($record) => $record->total_price),

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
            'index' => ListCartItems::route('/'),
        ];
    }
}
