<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetailProgram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::table('programs', function(Blueprint $table){
        $table->text('jumlah_pertemuan')->nullable();
        $table->text('opsi_tanggal_mulai')->nullable();
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
      Schema::table('programs', function(Blueprint $table){
        $table->text('jumlah_pertemuan')->nullable();
        $table->text('opsi_tanggal_mulai')->nullable();
      });
    }
}
