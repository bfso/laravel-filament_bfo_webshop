<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wawi_categories', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('description')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();
        });

    }
};
