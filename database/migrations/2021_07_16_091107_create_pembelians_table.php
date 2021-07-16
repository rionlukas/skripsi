<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->string('TransactionId');
            $table->string('Supplier');
            $table->string('NamaKain');
            $table->string('KodeKain');
            $table->string('JenisKain');
            $table->integer('Jumlah');
            $table->timestamp('TanggalPembelian');
            $table->string('Keterangan');
            $table->string('Status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelians');
    }
}
