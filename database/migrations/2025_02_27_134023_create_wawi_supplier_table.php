<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wawi_Supplier', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name')->nullable(); 
            $table->text('supplier_description')->nullable(); 
            $table->string('phone_number')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('location')->nullable(); 
            $table->string('contact_person')->nullable(); 
            $table->timestamps();

            
            $table->foreignId('category_id')->constrained('wawi_categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wawi_Supplier');
    }
};
