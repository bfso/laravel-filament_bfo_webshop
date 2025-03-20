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
                    Tab::make('General')
                        ->schema([
                            TextInput::make('name')
                                ->required(),
                            MarkdownEditor::make('description')
                                ->toolbarButtons(['bold', 'italic', 'strike', 'link', 'codeBlock', 'orderedList', 'bulletList']),
                            TextInput::make('phone'),
                            TextInput::make('email'),
                            TextInput::make('location'),
                            TextInput::make('contact_person'),
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
                ->toggleable(),
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
                Filter::make('amount')
                    ->form([
                        TextInput::make('amount_from')
                            ->numeric()
                            ->placeholder('Min. amount')
                            ->label('Min. amount'),
                        TextInput::make('amount_to')
                            ->numeric()
                            ->placeholder('Max. amount')
                            ->label('Max. amount'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query->when(
                            $data['amount_from'] ?? null,
                            fn (Builder $query, $amountFrom) => $query->where('amount', '>=', $amountFrom)
                        )->when(
                            $data['amount_to'] ?? null,
                            fn (Builder $query, $amountTo) => $query->where('amount', '<=', $amountTo)
                        );
                    })
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make()
            ]);
    }
}
