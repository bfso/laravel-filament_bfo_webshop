<?php

namespace Sapium\FilamentPackageSapiumCart\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cart_id',
        'product_id',
        'quantity',
        'options',
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
