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
            $table->timestamp('date_time')->nullable(false);
            $table->decimal('end_price', 10, 2)->nullable(false);
            $table->integer('checkout_customer_id')->nullable(false);
            $table->integer('delivery_method_id')->nullable(false);
            $table->integer('payment_method_id')->nullable(false);
            $table->timestamps();
        });


        // Table: order_items
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable(false);
            $table->integer('original_item_id')->nullable(false);
            $table->string('name', 255)->nullable(false);
            $table->text('description')->nullable(true);
            $table->decimal('price', 10, 2)->nullable(false);
            $table->integer('quantity')->nullable(false);
        });


        // Table: checkout customers
        Schema::create('checkout_customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255)->nullable(false);
            $table->string('last_name', 255)->nullable(false);
            $table->date('birth_date')->nullable(false);
            $table->string('email_address', 255)->nullable(false);
            $table->string('phone_number', 255)->nullable(true);
            $table->string('street', 255)->nullable(false);
            $table->string('zip', 255)->nullable(false);
            $table->string('city', 255)->nullable(false);
            $table->integer('country_id')->nullable(false);
            $table->timestamps();
        });


        // Table: checkout countries
        Schema::create('checkout_countries', function (Blueprint $table) {
            $table->id();
            $table->string('country_label');
        });


        // Create foreign keys
        Schema::table('order_items', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders');
        });

    }
};
