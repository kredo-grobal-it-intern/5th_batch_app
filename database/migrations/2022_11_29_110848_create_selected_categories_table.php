<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectedCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selected_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('question_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selected_categories');
    }
}
