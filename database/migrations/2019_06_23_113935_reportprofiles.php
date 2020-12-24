<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reportprofiles extends Migration
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
        Schema::create('reportsprofiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->foreign('username')->references('username')->on('users');
            $table->string('name');
            $table->string('unit');
            $table->integer('min_range')->unsigned();
            $table->integer('max_range')->unsigned();
            $table->integer('cost')->unsigned();
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
        Schema::dropIfExists('reportsprofiles');
    }
}
