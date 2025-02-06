<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources;


use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\MarkdownEditor;
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
        return $form->schema([
            Tabs::make('Product Details')
                ->columnSpan('full')
                ->tabs([
                    Tab::make('General')
                        ->schema([
                            TextInput::make('product_name')->required(),
                            MarkdownEditor::make('product_description')
                                ->toolbarButtons(['bold', 'italic', 'strike', 'link', 'codeBlock', 'orderedList', 'bulletList']),
                        ]),

                    Tab::make('Prices')
                        ->schema([
                            TextInput::make('purchase_price')->numeric()->suffix('CHF'),
                            TextInput::make('product_price')->gt('purchase_price')->required()->numeric()->suffix('CHF'),
                            TextInput::make('special_price')->numeric()->suffix('CHF'),
                        ]),

                    Tab::make('Special Prices')
                        ->schema([
                            DatePicker::make('special_price_from'),
                            DatePicker::make('special_price_to')->afterOrEqual('special_price_from'),
                        ]),

                    Tab::make('Images')
                        ->schema([
                            FileUpload::make('image')->image(),
                        ]),
                ]),
        ]);
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
            TextColumn::make('special_price_to'),
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
