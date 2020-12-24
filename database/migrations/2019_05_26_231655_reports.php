<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reports extends Migration
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
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('report_id')->unique();
             $table->string('report_url')->unique();
            $table->string('username');
            $table->foreign('username')->references('username')->on('users');
            $table->string('name');
            $table->string('addr');
            $table->tinyInteger('age');
            $table->enum('gender',
                ['Male','Female']);
            $table->integer('cost')->unsigned();
            $table->bigInteger('phone');
            $table->string('eMail')->nullable();
            $table->string('report_name');
            $table->longText('report');
            $table->longText('footnote')->nullable();
            $table->tinyInteger('SMS')->default(0);
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
        Schema::dropIfExists('reports');
    }
}
