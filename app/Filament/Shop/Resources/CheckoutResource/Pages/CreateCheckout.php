<?php

namespace App\Filament\Shop\Resources\CheckoutResource\Pages;

use App\Filament\Shop\Resources\CheckoutResource;
use App\Models\CheckoutCountry;
use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Date;
use Livewire\Attributes\Title;
use Livewire\Features\SupportPageComponents\BaseTitle;
use Parfaitementweb\FilamentCountryField\Forms\Components\Country;


class CreateCheckout extends CreateRecord
{
    protected static string $resource = CheckoutResource::class;

    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                # Adress and Name fields
                Group::make([
                    TextInput::make('first_name')->required(),
                    TextInput::make('last_name')->required(),
                    DatePicker::make('birth_date')->required(),
                    TextInput::make('email_address')->email()->required(),
                    TextInput::make('phone_number')->required(),
                    TextInput::make('street')->required(),
                    TextInput::make('zip')->required(),
                    TextInput::make('city')->required(),
                    Country::make('country')->required(),
                ])->relationship('customer'),

                Group::make([ 
                    # Delivery method
                    Select::make('delivery_method_id')->options([
                        '1'=> 'Post',
                        '2'=> 'Car',
                        '3'=> 'Airplane',
                    ])->required(),

                    # Payment fields
                    Select::make('payment_method_id')->options([
                        '1'=> 'Credit Card',
                        '2'=> 'Bitcoin',
                        '3'=> 'Monero',
                    ])->required(),
                ]),

                Placeholder::make('end_price')
                ->label('Total Price')
                ->content(content: function () {
                    return 12.5;
                }),
            ]);
    }
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['end_price'] = 12.5; 
        $data['checkout_customer_id'] = 2;
        $data['country_id'] = 1;
        return $data;
    }
}
