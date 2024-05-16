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
        Schema::create('level_hargas', function (Blueprint $table) {
            $table->string('kode_level')->primary();
            $table->string('kode_produk');
            $table->string('nama_level');
            $table->string('harga_satuan');
            $table->timestamps();

            $table->foreign('kode_produk')->references('kode_produk')->on('produks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_hargas');
    }
};
