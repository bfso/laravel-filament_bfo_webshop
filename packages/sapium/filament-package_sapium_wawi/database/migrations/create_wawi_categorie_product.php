<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPostTable extends Migration
{
    public function up()
    {
        Schema::create('category_post', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('wawi_categories')->onDelete('cascade');
            $table->foreignId('post_id')->constrained()->onDelete('cascade'); // Verweist auf das Post-Modell
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_post');
    }
}
