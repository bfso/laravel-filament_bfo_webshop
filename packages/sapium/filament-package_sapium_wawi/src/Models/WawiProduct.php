<?php

namespace Sapium\FilamentPackageSapiumWawi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WawiProduct extends Model
{
    use HasFactory;

    protected $table = 'wawi_products';

    protected $fillable = [
        'id',
        'product_name',
        'product_description',
        'purchase_price',
        'product_price',
        'special_price',
        'special_price_from',
        'special_price_to',
        'image',
        'category_id', // Add the category_id to the fillable array
    ];

    // Define the relationship with WawiCategories
    public function category()
    {
        return $this->belongsTo(WawiCategories::class, 'category_id'); // Assuming 'category_id' is the foreign key in wawi_products
    }
}
