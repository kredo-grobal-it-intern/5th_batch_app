<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->nullable();
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();//電話番号
            $table->string('postcode')->nullable();//郵便番号
            $table->string('room_num')->nullable();//アパート 部屋番号
            $table->string('street_address')->nullable();//地区、番地
            $table->string('address')->nullable();//市町村
            $table->string('prefecture')->nullable();//都道府県
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->date('birthdate')->nullable();
            $table->string('password');
            $table->string('introduction')->nullable();
            $table->unsignedBigInteger('role_id')
                ->default(2)
                ->comment('1:admin 2:user 3:owner');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
