<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $filable = [
        'kode_produk',
        'jumlah',
        'subtotal',
    ];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'kode_penjualan', 'kode_penjualan');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'kode_produk', 'kode_produk');
    }
}
