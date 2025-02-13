<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources;


use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Sapium\FilamentPackageSapiumWawi\Models\WawiStock;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiStockResource\Pages\CreateWawiStock;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiStockResource\Pages\EditWawiStock;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiStockResource\Pages\ListWawiStock;

class WawiStockResource extends Resource
{

    protected static ?string $model = WawiStock::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Tabs::make('Product Details')
                ->columnSpan('full')
                ->tabs([
                    Tab::make('General')
                        ->schema([
                            ColorPicker::make('color')
                                ->required(),
                            MarkdownEditor::make('description')
                                ->toolbarButtons(['bold', 'italic', 'strike', 'link', 'codeBlock', 'orderedList', 'bulletList']),
                            TextInput::make('amount')
                                ->numeric(),
                            TextInput::make('price')
                                ->numeric()
                                ->suffix('CHF'),
                            ]),
                    ]),

    ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWawiStock::route('/'),
            'create' => CreateWawiStock::route('/create'),
            'edit' => EditWawiStock::route('/{record}/edit'),
        ];
    }

    public static function table(Table $table): Table
    {
        // Use toggleable() to allow users to select visible columns.
        // Important: Key columns should not be toggleable.
        $tableComponents = [
            TextColumn::make('id')
                ->sortable(),
            TextColumn::make('color')
                ->label('Name')
                ->sortable()
                ->searchable(),
            TextColumn::make('description')
                ->label('Beschreibung')
                ->sortable()
                ->searchable()
                ->wrap()
                ->limit(50)
                ->markdown()
                ->toggleable(),
            TextColumn::make('price')
                ->label('Kaufpreis')
                ->money('CHF')
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('amount')
                ->sortable()
                ->searchable()
                ->toggleable(),
        ];

        return $table
            ->columns($tableComponents)
            ->filters([
            //   here can you make Filters for the table
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make()
            ]);
    }
}
