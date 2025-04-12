<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{

    protected $fillable = [
        'end_price',
        'checkout_customer_id',
        'delivery_method_id',
        'payment_method_id'
    ];

    public function customer() {
        return $this->belongsTo(CheckoutCustomer::class,'checkout_customer_id');
    }


}
