<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nama');
            $table->text('email');
            $table->text('hp');
            $table->text('jenis_kelamin');
            $table->text('kota_asal');
            $table->text('tempat_lahir');
            $table->date('tgl_lahir');
            $table->text('institusi');
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
        Schema::dropIfExists('pendaftars');
    }
}
