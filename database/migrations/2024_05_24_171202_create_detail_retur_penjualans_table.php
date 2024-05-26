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
        Schema::create('detail_retur_penjualans', function (Blueprint $table) {
            $table->string('kode_retur');
            $table->string('kode_produk');
            $table->integer('jumlah');
            $table->integer('subtotal');
            $table->timestamps();

            $table->foreign('kode_retur')->references('kode_retur')->on('retur_penjualans')->onDelete('cascade');
            $table->foreign('kode_produk')->references('kode_produk')->on('produks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_retur_penjualans');
    }
};
