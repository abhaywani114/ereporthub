<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::enableForeignKeyConstraints();
        Schema::defaultStringLength(191);
        Schema::create('labs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->foreign('username')->references('username')->on('users');
            $table->string('regd_id');
            $table->string('address');
            $table->String('PO');
            $table->bigInteger('phone_no');
            $table->string('country');
            $table->string('logo');
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
        //
         Schema::dropIfExists('labs');
    }
}
