<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailReturPenjualan extends Model
{
    use HasFactory;

    protected $filable = [
        'kode_produk',
        'jumlah',
        'subtotal'
    ];

    public function retur_penjualan()
    {
        return $this->belongsTo(ReturPenjualan::class, 'kode_retur', 'kode_retur');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'kode_produk', 'kode_produk');
    }
}
