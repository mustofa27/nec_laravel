<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuktisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buktis', function (Blueprint $table) {
            $table->increments('id');
            $table->text('desc');
            $table->text('path');
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
        Schema::dropIfExists('buktis');
    }
}
