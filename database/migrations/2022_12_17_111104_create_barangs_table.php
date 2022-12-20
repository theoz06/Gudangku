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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_barang');
            $table->string('Brand');
            $table->string('UoM');
            $table->string('Kategori'); 
            $table->bigInteger('Price'); 
            $table->string('Gambar'); 
            $table->string('Catatan');
            $table->string('jPengiriman');
            
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
};
