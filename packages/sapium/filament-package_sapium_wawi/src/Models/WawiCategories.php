<?php

namespace Sapium\FilamentPackageSapiumWawi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WawiCategories extends Model
{
    use HasFactory;

    protected $table = 'wawi_categories';

    protected $fillable = [
        'id',
        'name',
        'description',
        'color', // Background color for the category label
    ];


    // Define the relationship with WawiProduct
    public function products()
    {
        return $this->belongsToMany(WawiProduct::class, 'product_category', 'category_id', 'product_id');
    }
}
