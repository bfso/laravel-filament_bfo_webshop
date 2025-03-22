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
use Sapium\FilamentPackageSapiumWawi\Models\WawiCategories;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiCategoriesResource\Pages\CreateWawiCategories;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiCategoriesResource\Pages\EditWawiCategories;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiCategoriesResource\Pages\ListWawiCategories;

class WawiCategoriesResource extends Resource
{

    protected static ?string $model = WawiCategories::class;
    protected static ?string $navigationIcon = 'heroicon-o-archive-box';


    public static function form(Form $form): Form
    {
        return $form->schema([
            Tabs::make('Product Details')
                ->columnSpan('full')
                ->tabs([
                    Tab::make('Allgemein')
                        ->schema([
                            TextInput::make('name')
                                ->required(),
                            MarkdownEditor::make('description')
                                ->toolbarButtons(['bold', 'italic', 'strike', 'link', 'codeBlock', 'orderedList', 'bulletList'])
                                ->label('Beschreibung'),
                            ColorPicker::make('color')
                                ->required()
                                ->label('Farbe'),
                         ]),
                ]),
    ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWawiCategories::route('/'),
            'create' => CreateWawiCategories::route('/create'),
            'edit' => EditWawiCategories::route('/{record}/edit'),
        ];
    }

    public static function table(Table $table): Table
    {
        // Use toggleable() to allow users to select visible columns.
        // Important: Key columns should not be toggleable.
        $tableComponents = [
            TextColumn::make('name')
                ->label('Name')
                ->sortable()
                ->searchable(),
            TextColumn::make('description')
                ->label('Beschreibung')
                ->sortable()
                ->searchable()
                ->wrap()
                ->limit(50)
                ->markdown(),
            TextColumn::make('color')
            ->label('Color')
            ->sortable()
            ->searchable()
            ->formatStateUsing(function ($state) {
                return "<div style='width: 20px; height: 20px; background-color: {$state};' title='{$state}'></div>";
            })
            ->html(),
        ];

        return $table
            ->columns($tableComponents)
            ->filters([

            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make()
            ]);
    }
}
