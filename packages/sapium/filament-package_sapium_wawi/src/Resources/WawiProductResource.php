<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources;


use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Sapium\FilamentPackageSapiumWawi\Models\WawiProduct;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiProductResource\Pages\CreateWawiProduct;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiProductResource\Pages\EditWawiProduct;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiProductResource\Pages\ListWawiProduct;

class WawiProductResource extends Resource
{

    protected static ?string $model = WawiProduct::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';

    public static function form(Form $form): Form
    {
        $formComponents = [
            TextInput::make('id'),
            TextInput::make('product_name')->required(),
            TextInput::make('product_description'),
            TextInput::make('purchase_price')->numeric()->suffix('CHF'),
            TextInput::make('product_price')->required()->numeric()->suffix('CHF'),
            TextInput::make('special_price')->numeric()->suffix('CHF'),
            DatePicker::make('special_price_from'),
            DatePicker::make('special_price_to'),

        ];

        return $form->schema($formComponents);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWawiProduct::route('/'),
            'create' => CreateWawiProduct::route('/create'),
            'edit' => EditWawiProduct::route('/{record}/edit'),
        ];
    }

    public static function table(Table $table): Table
    {
        $tableComponents = [
            TextColumn::make('id'),
            TextColumn::make('product_name'),
            TextColumn::make('product_description'),
            TextColumn::make('purchase_price'),
            TextColumn::make('product_price'),
            TextColumn::make('special_price'),
            TextColumn::make('special_price_from'),
            TextColumn::make('special_price_to')
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
