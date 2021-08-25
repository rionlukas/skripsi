<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EoqUpdatedFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eoq', function (Blueprint $table) {
            $table->integer('JumlahUnit');
            $table->integer('BiayaPesanan');
            $table->integer('HargaPembelian');
            $table->integer('BiayaPenyimpanan');
            $table->string('KodeKain');
            $table->string('NamaKain');
            $table->integer('EOQ');
            $table->integer('JumlahOPT');
            $table->integer('FrekuensiOrder');
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
    }
}
