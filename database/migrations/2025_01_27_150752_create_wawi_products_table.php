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
            $table->timestamps();

            // Adding the category_id foreign key field
            $table->foreignId('category_id')->constrained('wawi_categories')->onDelete('cascade'); // Adds the category_id field and references wawi_categories
        });
    }

    public function down()
    {
        Schema::dropIfExists('wawi_products');
    }
};
