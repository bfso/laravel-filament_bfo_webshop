<?php

namespace Sapium\FilamentPackageSapiumCart\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sapium\FilamentPackageSapiumCart\Models\CartItem;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'quantity',
    ];

    public function updateQuantity(int $quantity): void
    {
        $this->quantity = max(1, $quantity);
        $this->save();
    }
  
    public function cartItems() {
        return $this->hasMany(CartItem::class);
    } 
}
