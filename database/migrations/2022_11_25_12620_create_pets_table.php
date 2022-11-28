<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('pet_type', ['dog', 'cat']);
            $table->text('breed');
            $table->text('weight');
            $table->text('charateristic');
            $table->string('image');
            $table->enum('vaccination_status', ['Compeleted', 'Not yet']);
            $table->enum('gender', ['Male', 'Female']);
            $table->string('url');
            $table->string('date_of_brith');
            $table->tinyInteger('neutered');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
