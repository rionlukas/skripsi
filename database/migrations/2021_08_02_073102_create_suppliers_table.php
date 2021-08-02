<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //`KodeSupplier`, `NamaSupplier`, `Alamat`, `Kota`, `Telepon`
        
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('KodeSupplier');
            $table->string('NamaSupplier');
            $table->string('Alamat');
            $table->string('Kota');
            $table->string('Telepon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
