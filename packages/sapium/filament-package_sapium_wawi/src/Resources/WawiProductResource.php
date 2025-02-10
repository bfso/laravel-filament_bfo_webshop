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
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
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
                            FileUpload::make('image')
                                ->image()
                                ->imageEditor()
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
        // Use toggleable() to allow users to select visible columns.
        // Important: Key columns should not be toggleable.
        $tableComponents = [
            TextColumn::make('id')
                ->sortable(),
            TextColumn::make('product_name')
                ->label('Name')
                ->sortable()
                ->searchable(),
            TextColumn::make('product_description')
                ->label('Beschreibung')
                ->sortable()
                ->searchable()
                ->wrap()
                ->limit(50),
            TextColumn::make('purchase_price')
                ->label('Kaufpreis')
                ->money('CHF')
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('product_price')
                ->label('Verkaufpreis')
                ->money('CHF')
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('special_price')
                ->label('Spezialpreis')
                ->money('CHF')
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('special_price_from')
                ->label('Start Spezialpreis')
                ->date()
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('special_price_to')
                ->label('End Spezialpreis')
                ->date()
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('image')
                ->label('Bild')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true)
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('product_price')
                ->label('Verkaufpreis')
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('special_price')
                ->label('Spezialpreis')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('special_price_from')
                ->label('Start Spezialpreis')
                ->date()
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('special_price_to')
                ->label('End Spezialpreis')
                ->date()
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];

        return $table
            ->columns($tableComponents)
            ->filters([
                Filter::make('range_purchase_price')
                    ->visible(fn (Table $table): bool => $table->getColumn('purchase_price')?->isVisible())
                    ->form([
                        TextInput::make('min_Kaufpreis')->numeric()->label('Min. Kaufpreis'),
                        TextInput::make('max_Kaufpreis')->numeric()->label('Max. Kaufpreis'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['min_Kaufpreis'],
                                fn (Builder $query, $price): Builder => $query->where('purchase_price', '>=', $price),
                            )
                            ->when(
                                $data['max_Kaufpreis'],
                                fn (Builder $query, $price): Builder => $query->where('purchase_price', '<=', $price),
                            );
                    }),
                Filter::make('range_product_price')
                    ->visible(fn (Table $table): bool => $table->getColumn('product_price')?->isVisible())
                    ->form([
                        TextInput::make('min_Verkaufpreis')->numeric()->label('Min. Verkaufpreis'),
                        TextInput::make('max_Verkaufpreis')->numeric()->label('Max. Verkaufpreis'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['min_Verkaufpreis'],
                                fn (Builder $query, $price): Builder => $query->where('product_price', '>=', $price),
                            )
                            ->when(
                                $data['max_Verkaufpreis'],
                                fn (Builder $query, $price): Builder => $query->where('product_price', '<=', $price),
                            );
                    }),
                Filter::make('range_special_price')
                    ->visible(fn (Table $table): bool => $table->getColumn('special_price')?->isVisible())
                    ->form([
                        TextInput::make('min_Spezialpreis')->numeric()->label('Min. Spezialpreis'),
                        TextInput::make('max_Spezialpreis')->numeric()->label('Max. Spezialpreis'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['min_Spezialpreis'],
                                fn (Builder $query, $price): Builder => $query->where('special_price', '>=', $price),
                            )
                            ->when(
                                $data['max_Spezialpreis'],
                                fn (Builder $query, $price): Builder => $query->where('special_price', '<=', $price),
                            );
                    }),
                Filter::make('date_range')
                    ->visible(fn (Table $table): bool =>  
                        $table->getColumn('special_price_from')?->isVisible() && 
                        $table->getColumn('special_price_to')?->isVisible()
                    )
                    ->form([
                        DatePicker::make('Start_Spezialpreis')->label('Start Spezialpreis'),
                        DatePicker::make('End_Spezialpreis')->label('End Spezialpreis'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['Start_Spezialpreis'],
                                fn (Builder $query, $date): Builder => $query->whereDate('special_price_from', '>=', $date),
                            )
                            ->when(
                                $data['End_Spezialpreis'],
                                fn (Builder $query, $date): Builder => $query->whereDate('special_price_to', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make()
            ]);
    }
}
