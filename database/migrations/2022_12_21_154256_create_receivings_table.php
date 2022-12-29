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
        Schema::create('receiving', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_Barang');
            $table->string('Date');
            $table->bigInteger('JumlahMasuk');
            $table->string('Supplier');
            $table->string('No_referensi');
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
        Schema::dropIfExists('receiving');
    }
};
