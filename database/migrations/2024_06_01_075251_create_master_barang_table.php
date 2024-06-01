<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('master_barang', function (Blueprint $table) {
            $table->id('kode_barang');
            $table->string('nama_barang');
            $table->string('satuan');
            $table->integer('qty');
            $table->decimal('harga', 10, 2);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_barang');
    }
};
