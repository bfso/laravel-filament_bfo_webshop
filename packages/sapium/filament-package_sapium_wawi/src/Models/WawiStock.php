<?php

namespace Sapium\FilamentPackageSapiumWawi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sapium\FilamentPackageSapiumWawi\Models\WawiProduct;  // Import the WawiProduct model


class WawiStock extends Model
{
    use HasFactory; 

    protected $table = "wawi_stocks";
    protected $fillable = ['color', 'description','price','amount'];  // Add 'product_id' to fillable

    // Define the relationship between stock and product
}
