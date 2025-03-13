<?php

namespace Sapium\FilamentPackageSapiumCart\Resources\CartItemResource\Components;


use Filament\Actions;
use Filament\Tables\Actions\Action;

class CartAction extends Action
{

    public function setUp(): void
    {
        $this->label('Add to Cart');
        $this->action(function ($record) {
            dd('asdf');
        });
    }
}
