<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issuing', function (Blueprint $table) {
            $table->id();
            $table->string('Date');
            $table->string('Nama_Barang');
            $table->string('No_referensi');
            $table->string('Picker');
            $table->bigInteger('jumlahKeluar');
            $table->string('Catatan');
            $table->string('UoM');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issuing');
    }
};
