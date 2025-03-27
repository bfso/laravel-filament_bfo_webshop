<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shop_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wawi_product_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('price');
            $table->float('special_price')->nullable();
            $table->date('special_price_from')->nullable();
            $table->date('special_price_to')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('wawi_product_id')->references('id')->on('wawi_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_products');
    }
};
