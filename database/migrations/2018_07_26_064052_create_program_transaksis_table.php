<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_program')->unsigned();
            $table->foreign('id_program')->references('id')->on('programs');
            $table->integer('id_transaksi')->unsigned();
            $table->foreign('id_transaksi')->references('id')->on('transaksis');
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
        Schema::dropIfExists('program_transaksis');
    }
}
