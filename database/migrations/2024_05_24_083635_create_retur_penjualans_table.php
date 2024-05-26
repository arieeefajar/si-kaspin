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
        Schema::create('retur_penjualans', function (Blueprint $table) {
            $table->String('kode_retur')->primary();
            $table->unsignedBigInteger('kode_operator');
            $table->string('kode_pelanggan');
            $table->integer('total');
            $table->integer('bayar');
            $table->integer('kembalian');
            $table->timestamps();

            $table->foreign('kode_operator')->references('id')->on('users');
            $table->foreign('kode_pelanggan')->references('kode_pelanggan')->on('pelanggans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retur_penjualans');
    }
};
