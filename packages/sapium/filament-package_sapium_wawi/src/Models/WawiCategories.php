<?php

namespace Sapium\FilamentPackageSapiumWawi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WawiCategories extends Model
{
    use HasFactory; 

    protected $table = "wawi_categories";
    protected $fillable = [
        'name', 
        'description',
        'color'
    ];  

    // Define the relationship between stock and product
}
