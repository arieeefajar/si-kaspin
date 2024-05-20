<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    use HasFactory;

    protected $filable = [
        'kode_produk',
        'jumlah',
        'subtotal'
    ];

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class, 'kode_pembelian', 'kode_pembelian');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'kode_produk', 'kode_produk');
    }
}
