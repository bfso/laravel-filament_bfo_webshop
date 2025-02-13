<?php

namespace Sapium\FilamentPackageSapiumCart\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Sapium\FilamentPackageSapiumCart\Models\Cart;

class CartController extends Controller
{
    public function updateQuantity(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart->updateQuantity($request->input('quantity'));

        return response()->json([
            'message' => 'Quantity updated',
            'cart' => $cart
        ]);
    }
}
