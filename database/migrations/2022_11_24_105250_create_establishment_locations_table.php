<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablishmentLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishment_locations', function (Blueprint $table) {
            $table->unsignedBigInteger('establishment_id');
            $table->unsignedBigInteger('location_id');
                                                                                    // ->onDelete('cascade') いる？
            $table->foreign('establishment_id')->references('id')->on('establishments');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('establishment_locations');
    }
}
