<?php

namespace Sapium\FilamentPackageSapiumCheckout\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
   use HasFactory;


   /**
    * Table name
    *
    * @var string
    */
   protected $table = 'checkouts';
   protected $primaryKey = 'id';
   public $incrementing = true;
   public $timestaps = true;
   protected $keyType = 'int';
   protected $fillable = [
    'end_price',
    'checkout_customer_id'
   ];
}
