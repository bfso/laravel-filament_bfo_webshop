<?php

namespace App\Filament\Shop\Resources;

use App\Filament\Shop\Resources\ProductResource\Pages;
use App\Filament\Shop\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\TextInput;
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
                Filter::make('price_range')
                    ->form([
                        TextInput::make('min_price')
                            ->numeric()
                            ->label('Min Price (CHF)')
                            ->placeholder('Enter minimum price'),
                        TextInput::make('max_price')
                            ->numeric()
                            ->label('Max Price (CHF)')
                            ->placeholder('Enter maximum price'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['min_price'], fn ($query, $min) => $query->where('price', '>=', $min))
                            ->when($data['max_price'], fn ($query, $max) => $query->where('price', '<=', $max));
                    }),     
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
