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
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
