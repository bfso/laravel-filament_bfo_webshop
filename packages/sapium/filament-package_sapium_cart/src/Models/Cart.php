<?php

namespace Sapium\FilamentPackageSapiumCart\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
