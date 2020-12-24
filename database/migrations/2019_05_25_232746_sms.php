<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sms extends Migration
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
        Schema::create('sms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->foreign('username')->references('username')->on('users');
            $table->string('tx_no')->unique();
            $table->string('plane_name');
            $table->string('sms_credit');
            $table->string('balance');
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
         Schema::dropIfExists('sms');
    }
}
