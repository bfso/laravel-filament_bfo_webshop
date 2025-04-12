<?php

namespace Sapium\FilamentPackageSapiumWawi\Resources;


use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Sapium\FilamentPackageSapiumWawi\Models\WawiSuppliers;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiSuppliersResource\Pages\CreateWawiSuppliers;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiSuppliersResource\Pages\EditWawiSuppliers;
use Sapium\FilamentPackageSapiumWawi\Resources\WawiSuppliersResource\Pages\ListWawiSuppliers;

class WawiSuppliersResource extends Resource
{

    protected static ?string $model = WawiSuppliers::class;
    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Tabs::make('Product Details')
                ->columnSpan('full')
                ->tabs([
                    Tab::make('Allgemein')
                        ->schema([
                            TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->maxLength(255),
                        
                            MarkdownEditor::make('description')
                                ->label('Beschreibung')
                                ->toolbarButtons(['bold', 'italic', 'strike', 'link', 'codeBlock', 'orderedList', 'bulletList'])
                                ->nullable(),
                        ]),
                    Tab::make('Kontaktinformationen')
                        ->schema([
                            TextInput::make('phone')
                                ->label('Telefon')
                                ->tel() 
                                ->rule('regex:/(\b(0041|0)|\B\+41)(\s?\(0\))?(\s)?[1-9]{2}(\s)?[0-9]{3}(\s)?[0-9]{2}(\s)?[0-9]{2}\b/') 
                                ->nullable()
                                ->numeric(),
                            
                            TextInput::make('email')
                                ->label('E-Mail')
                                ->email(),
                            
                            TextInput::make('location')
                                ->label('Standort')
                                ->maxLength(255)
                                ->nullable(),
                            
                            TextInput::make('contact_person')
                                ->label('Kontaktperson')
                                ->maxLength(255)
                                ->nullable(),
                        
                        ]),
                ]),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWawiSuppliers::route('/'),
            'create' => CreateWawiSuppliers::route('/create'),
            'edit' => EditWawiSuppliers::route('/{record}/edit'),
        ];
    }

    public static function table(Table $table): Table
    {
        // Use toggleable() to allow users to select visible columns.
        // Important: Key columns should not be toggleable.
        $tableComponents = [
            TextColumn::make('id')
                ->sortable(),
            TextColumn::make('name')
                ->label('Lieferant')
                ->sortable()
                ->searchable(),
            TextColumn::make('description')
                ->label('Beschreibung')
                ->sortable()
                ->searchable()
                ->wrap()
                ->limit(50)
                ->markdown(),
            TextColumn::make('phone')
                ->label('Telefon')
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('email')
                ->sortable()
                ->toggleable()
                ->label('E-Mail'),
            TextColumn::make('location')
                ->label('Standort')
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('contact_person')
                ->label('Kontaktperson')
                ->sortable()
                ->searchable()
                ->toggleable(),
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