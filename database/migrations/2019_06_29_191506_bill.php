<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::defaultStringLength(191);
        Schema::create('bill', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->foreign('username')->references('username')->on('users');
            $table->string('name');
            $table->string('addr');
            $table->tinyInteger('age');
            $table->bigInteger('phone');
            $table->string('eMail')->nullable();
            $table->enum('gender',
                ['Male','Female']);
            $table->string('report_name');
            $table->longtext('details');
            $table->integer('cost')->unsigned();
            $table->enum('status',['done','pending'])->default('pending');
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
         Schema::dropIfExists('bill');
    }
}
