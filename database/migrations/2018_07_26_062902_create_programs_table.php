<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('detail');
            $table->integer('harga');
            $table->text('tipe');
            $table->text('status');
            $table->text('durasi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->integer('id_group')->unsigned();
            $table->foreign('id_group')->references('id')->on('groups');
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
        Schema::dropIfExists('programs');
    }
}
