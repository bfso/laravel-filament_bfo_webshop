<?php

namespace Sapium\FilamentPackageSapiumCheckout\Models;

use Illuminate\Database\Eloquent\Model;

class CheckoutItem extends Model
{

    protected $fillable = [
        'original_item_id',
        'name',
        'description',
        'price',
        'quantity'
    ];
}
