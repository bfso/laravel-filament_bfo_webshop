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
            Forms\Components\Select::make('quantity')
                ->options([
                    49 => '49',
                    64 => '64',
                    81 => '81',
                ])
                ->required()
                ->native(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
            'index' => ListCartItems::route('/'),
        ];
    }
}
