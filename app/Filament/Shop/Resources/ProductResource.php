<?php

namespace App\Filament\Shop\Resources;

use App\Filament\Shop\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function table(Table $table): Table
    {
        return $table
              ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->extraAttributes(['class' => 'product-image']),
                Stack::make([
                    Tables\Columns\TextColumn::make('sku')
                        ->searchable()
                        ->sortable(),
                        Tables\Columns\TextColumn::make('title')
                        ->label('Title')
                        ->searchable()
                        ->sortable()
                        ->extraAttributes(['class' => 'product-title']),

                        Tables\Columns\TextColumn::make('price')
                        ->label('Price')
                        ->searchable()
                        ->sortable()
                        ->getStateUsing(function ($record) {
                            return $record->price . ' CHF';
                        }),

                    Tables\Columns\TextColumn::make('description')
                        ->label('Description')
                        ->limit(50), // Längere Beschreibungen kürzen
                ])
            ])

            ->contentGrid([
              'default' => 1,
              'sm' => 2,
              'md' => 3,
              'lg' => 4,
              'xl' => 5,
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
                    })
                    ->indicateUsing(function (array $data) {
                        $indicators = [];
                        if (!empty($data['min_price'])) {
                            $indicators[] = 'Min Price: ' . $data['min_price'] . ' CHF';
                        }
                        if (!empty($data['max_price'])) {
                            $indicators[] = 'Max Price: ' . $data['max_price'] . ' CHF';
                        }
                        return $indicators;
                    }),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),

        ];
    }
}
