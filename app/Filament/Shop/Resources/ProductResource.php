<?php

namespace App\Filament\Shop\Resources;

use App\Filament\Shop\Resources\ProductResource\Pages;
use App\Filament\Shop\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\Layout\Stack;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    Tables\Columns\TextColumn::make('sku')
                ->searchable(),
                Tables\Columns\TextColumn::make('title')
                ->label('Title')
                ->searchable(),
                Tables\Columns\TextColumn::make('price')
                ->label('Price'),
                Tables\Columns\TextColumn::make('description')
                ->label('Description')
                ])
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->filters([
                //
            ])

            ->headerActions([
                Action::make('Sync')
                ->action(function() {
                    dd('Placeholder');
                })
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
            'index' => Pages\ListProducts::route('/'),
        ];
    }
}
