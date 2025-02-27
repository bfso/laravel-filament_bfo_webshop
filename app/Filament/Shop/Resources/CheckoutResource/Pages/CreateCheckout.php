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
use Filament\Forms\Components\Section;
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
                Section::make("User Details")
                ->description("Please enter your details")
                ->schema([
                    # Adress and Name fields
                    Group::make([
                        TextInput::make('first_name'),
                        TextInput::make('last_name'),
                        DatePicker::make('birth_date'),
                        TextInput::make('email_address')->email()->required(),
                        TextInput::make('phone_number')->tel(),
                        TextInput::make('street'),
                        TextInput::make('zip'),
                        TextInput::make('city'),
                        Country::make('country'),
                    ])->relationship('customer'),
                ]),

                Section::make("Delivery and Payment")
                ->description("Select delivery and payment options")
                ->schema([
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
        return $data;
    }
}
