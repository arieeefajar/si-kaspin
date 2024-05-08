<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->string('kode_produk')->primary();
            $table->string('kode_kategori');
            $table->string('nama_produk');
            $table->string('gambar');
            $table->integer('stock');
            $table->timestamps();

            $table->foreign('kode_kategori')->references('kode_kategori')->on('kategori_produks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
