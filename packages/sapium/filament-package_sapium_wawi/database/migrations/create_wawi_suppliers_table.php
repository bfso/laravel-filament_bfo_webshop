<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wawi_suppliers', function (Blueprint $table) {
            $table->id(); 
            $table->string('name')->nullable(); 
            $table->text('description')->nullable(); 
            $table->string('phone')->nullable();
            $table->string('email')->nullable(); 
            $table->string('location')->nullable(); 
            $table->string('contact_person')->nullable(); 
            $table->timestamps(); 
        });
    }
};