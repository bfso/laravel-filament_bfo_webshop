<?php

namespace App\Filament\Shop\Resources\CheckoutResource\Pages;

use App\Filament\Shop\Resources\CheckoutResource;
use App\Models\CheckoutCountry;
use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Date;
use Livewire\Attributes\Title;
use Livewire\Features\SupportPageComponents\BaseTitle;

class CreateCheckout extends CreateRecord
{
    protected static string $resource = CheckoutResource::class;

    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                # Adress and Name fields
                Group::make([
                    TextInput::make('firstname')->required(),
                    TextInput::make('lastname')->required(),
                    DatePicker::make('birth_date')->required(),
                    TextInput::make('email_address')->email()->required(),
                    TextInput::make('phone_number')->required(),
                    TextInput::make('street')->required(),
                    TextInput::make('zip')->required(),
                    TextInput::make('city')->required(),
                    Select::make('country_id')
                    ->options(CheckoutCountry::pluck('country_label', 'id'))
                    ->required()
                ])->relationship('customer'),

                Group::make([ 
                    # Delivery method
                    Select::make('delivery_method_id')->options([
                        '1'=> 'Post',
                        '2 Card'=> 'Car',
                        '3'=> 'Airplane',
                    ])->required(),

                    # Payment fields
                    Select::make('payment_method_id')->options([
                        '1'=> 'Credit Card',
                            '2'=> 'Bitcoin',
                            '3'=> 'Monero',
                    ])->required(),
                ]),

            ]);
    }

}
