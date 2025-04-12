<?php

namespace Sapium\FilamentPackageSapiumCheckout\Models;

use Illuminate\Database\Eloquent\Model;

class CheckoutCustomer extends Model
{

    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'email_address',
        'phone_number',
        'street',
        'zip',
        'city',
        'country_id'
    ];
}
