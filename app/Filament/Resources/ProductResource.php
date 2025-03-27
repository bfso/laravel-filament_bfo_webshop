<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Actions\Action;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
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
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                Action::make('sync_product')
                    ->label('Sync Products')
                    ->action(function () { dd('Sync Products'); 
                        $url = "http://127.0.0.1:8000/v1/products";
                        $cURLConnection = curl_init();

                        curl_setopt($cURLConnection, CURLOPT_URL, $url);
                        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

                        $phoneList = curl_exec($cURLConnection);
                        curl_close($cURLConnection);

                        $jsonArrayResponse - json_decode($phoneList);
                        dd($jsonArrayResponse);

                    })
            ])            
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
