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
    }
};
