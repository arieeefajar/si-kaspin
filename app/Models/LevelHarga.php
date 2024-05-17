<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelHarga extends Model
{
    use HasFactory;

    protected $filable = [
        'kode_produk',
        'nama_level',
        'harga_satuan',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'kode_produk', 'kode_produk');
    }
}
