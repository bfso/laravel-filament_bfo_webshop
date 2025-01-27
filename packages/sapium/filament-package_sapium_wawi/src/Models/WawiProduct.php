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
    ];
}
