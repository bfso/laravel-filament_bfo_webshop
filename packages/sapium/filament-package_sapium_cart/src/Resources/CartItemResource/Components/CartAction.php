<?php

namespace Sapium\FilamentPackageSapiumCart\Resources\CartItemResource\Components;

use Filament\Actions;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use App\Models\Product;
use App\Models\Cart;
use Sapium\FilamentPackageSapiumCart\Models\CartItem;

class CartAction extends Action
{
    public function setUp(): void
    {
        $this->label('Add to Cart');
        $this->action(function (Product $record) {
            $cart = Cart::where('user_id', auth()->user()->id)->first();
            if (!$cart) {
                $cart = new Cart();
                $cart->user_id = auth()->user()->id;
                $cart->save();
            }

            $cartItem = new CartItem();
            $cartItem->cart_id = $cart->id;
            $cartItem->product_id = $record->id;
            $cartItem->save();

            $cart->cartItems()->save($cartItem);

            Notification::make()
                ->title('Product has been successfully added to Cart')
                ->success()
                ->send();
        });
    }
}
