<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wawi_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->text('product_description')->nullable();
            $table->float('purchase_price')->nullable();
            $table->float('product_price');
            $table->float('special_price')->nullable();
            $table->date('special_price_from')->nullable();
            $table->date('special_price_to')->nullable();
            $table->string('image')->nullable(); 
            // add fields
    
                $table->timestamps();
            });
            // Schema::create('wawi_customers', function (Blueprint $table) {
            //     $table->id();
            //     $table->string('customer_name');
            //     $table->string('customer_email');
            //     $table->string('customer_phone');
            //     $table->string('customer_address');
            //     $table->string('customer_country');
            //     $table->string('isSupplier');
            //     $table->string('isCostumer');
            //     // add fields
    
            //     $table->timestamps();
            // });
    }
};
