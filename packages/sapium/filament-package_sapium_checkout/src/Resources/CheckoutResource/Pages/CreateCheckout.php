<?php

namespace Sapium\FilamentPackageSapiumCheckout\Resources\CheckoutResource\Pages;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Parfaitementweb\FilamentCountryField\Forms\Components\Country;
use App\Models\Cart;
use Sapium\FilamentPackageSapiumCheckout\Resources\CheckoutResource;


class CreateCheckout extends CreateRecord
{
    protected static string $resource = CheckoutResource::class;


    private int $cart_id;


    /**
     * Constructor
     *
     * @param [type] ...$args
     */
    public function __construct(...$args) {
        // Get cart id
        $user = auth()->id();
        $test = auth();
        //echo '<pre>';var_dump($test);
        $cart_id = Cart::where("user_id", $user)->first()->id;
        $this->cart_id = $cart_id;
        //die($cart_id);
    }


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
                            Hidden::make('cart_id')->default($this->cart_id)
                        ])->relationship('customer'),
                    ]),

                Section::make("Delivery and Payment")
                    ->description("Select delivery and payment options")
                    ->schema([
                        Group::make([
                            # Delivery method
                            Select::make('delivery_method_id')->options([
                                '1'=> 'Post-Pack Budget 9.- (4 Tage)',
                                '2'=> 'DHL 15.- (2 Tage)',
                            ])->required()->label('Delivery method'),

                            # Payment fields
                            Select::make('payment_method_id')->options([
                                '1'=> 'Twint',
                                '2'=> 'Vorauskasse',
                            ])->required()->label('Payment method'),
                        ]),
                    ]),


                Section::make("Terms and Conditions")
                    ->description("Please accept the terms and conditions")
                    ->schema([
                        Group::make([
                            // Checkbox
                            Checkbox::make('accept_terms_and_contitions')
                                ->accepted()->label('I accept the terms and conditions')
                        ])
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


    protected function afterCreate(): void {
        redirect()->route('filament.pages.checkout-confirmation-page');
    }
}
