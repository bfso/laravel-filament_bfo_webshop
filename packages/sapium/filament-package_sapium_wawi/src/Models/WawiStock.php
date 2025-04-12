<?php

namespace Sapium\FilamentPackageSapiumWawi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sapium\FilamentPackageSapiumWawi\Models\WawiSuppliers;


class WawiStock extends Model
{
    use HasFactory; 

    protected $table = "wawi_stocks";
    protected $fillable = ['color', 'description','price','amount', 'supplier_id'];  

    public function supplier()
    {
        return $this->belongsTo(WawiSuppliers::class, 'supplier_id'); 
    }
}
