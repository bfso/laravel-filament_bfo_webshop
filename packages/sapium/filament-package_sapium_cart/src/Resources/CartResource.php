<?php

namespace Sapium\FilamentPackageSapiumCart\Resources;


use App\Models\Cart;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Sapium\FilamentPackageSapiumCart\Resources\CartResource\Pages\CreateCart;
use Sapium\FilamentPackageSapiumCart\Resources\CartResource\Pages\EditCart;
use Sapium\FilamentPackageSapiumCart\Resources\CartResource\Pages\ListCart;

class CartResource extends Resource
{

    protected static ?string $model = Cart::class;
    protected static ?string $navigationIcon = 'heroicon-o-sun';

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
            'index' => ListCart::route('/'),
            'create' => CreateCart::route('/create'),
            'edit' => EditCart::route('/{record}/edit'),
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
