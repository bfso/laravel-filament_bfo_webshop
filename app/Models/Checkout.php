<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Checkout extends Model
{
    protected $fillable = [
        
    ];


    public function customer() : BelongsTo {
        return $this->belongsTo(CheckoutCustomer::class);
    }
}
