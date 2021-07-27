<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratJalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_jalans', function (Blueprint $table) {
            $table->id();
            $table->string('Salesman');
            $table->string('Tanggal');
            $table->string('KodeKain');
            $table->string('NamaKain');
            $table->integer('Jumlah');
            $table->integer('Harga');
            $table->integer('SubTotal');
            $table->integer('Total');
            $table->string('JSONString');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_jalans');
    }
}
