<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'wawi_product_id',
        'name',
        'description',
        'price',
        'special_price',
        'special_price_from',
        'special_price_to',
        'image',
    ];
}