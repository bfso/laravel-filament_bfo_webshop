<?php

namespace App\Filament\Shop\Resources\CheckoutResource\Pages;

use App\Filament\Shop\Resources\CheckoutResource;
use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
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
                Group::make([
                    TextInput::make('firstname')->required(),
                    TextInput::make('lastname')->required(),
                    DatePicker::make('birthdate')->required(),
                    TextInput::make('email')->email()->required(),
                    TextInput::make('phone')->required(),
                    TextInput::make('street')->required(),
                    TextInput::make('housenumber')->required(),
                    TextInput::make('zip')->required(),
                    TextInput::make('city')->required(),
                    TextInput::make('country')->required(),
                ])->relationship('customer'),
                Group::make([])->relationship(' '),

            ]);
    }

}
