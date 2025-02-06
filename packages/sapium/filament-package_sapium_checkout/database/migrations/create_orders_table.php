<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Upgrade application version
     *
     * @return void
     */
    public function up()
    {

        // Table: orders
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_time');
            $table->decimal('end_price', 10, 2);
            $table->integer('checkout_customer_id');
            $table->integer('delivery_method_id');
            $table->integer('payment_method_id');
            $table->timestamps();
        });


        // Table: order_items
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer('original_item_id');
            $table->string('name', 255);
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
        });


        // Table: checkout customers
        Schema::create('checkout_customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email_address', 255);
            $table->string('phone_number', 255);
            $table->string('street', 255);
            $table->string('zip', 255);
            $table->string('city', 255);
            $table->integer('country_id');
            $table->timestamps();
        });


        // Table: checkout countries
        Schema::create('checkout_countries', function (Blueprint $table) {
            $table->id();
            $table->string('country_label');
        });
    }
};
