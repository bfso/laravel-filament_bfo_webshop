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
            $table->string('product_description');
            $table->string('purchase_price');
            $table->string('product_price');
            $table->string('special_price');
            $table->string('special_price_from');
            $table->string('special_price_to');
            // add fields

            $table->timestamps();
        });
        Schema::create('wawi_customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('customer_address');
            $table->string('customer_country');
            // add fields

            $table->timestamps();
        });
        Schema::create('wawi_supplier', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name');
            $table->string('supplier_email');
            $table->string('supplier_phone');
            $table->string('supplier_address');
            $table->string('supplier_country');
        });
    }
};
