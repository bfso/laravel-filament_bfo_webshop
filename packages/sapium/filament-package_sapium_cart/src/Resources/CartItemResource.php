<?php

namespace Sapium\FilamentPackageSapiumCart\Resources;

use Sapium\FilamentPackageSapiumCart\Resources\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Sapium\FilamentPackageSapiumCart\Models\CartItem;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Sapium\FilamentPackageSapiumCart\Resources\Pages\ListCartItems;

class CartItemResource extends Resource
{
    protected static ?string $model = CartItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
            'index' => \Sapium\FilamentPackageSapiumCart\Resources\CartItemResource\Pages\ListCartItems::route('/'),
        ];
    }
}
