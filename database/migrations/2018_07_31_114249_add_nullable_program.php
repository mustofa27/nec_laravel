<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableProgram extends Migration
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
        $table->date('tanggal_mulai')->nullable();
        $table->date('tanggal_berakhir')->nullable();
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
        $table->dropColumn('tanggal_mulai');
        $table->dropColumn('tanggal_berakhir');
      });
    }
}
