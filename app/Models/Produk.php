<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // protected $primaryKey = 'kode_produk';
    // public $incrementing = false;

    protected $fillable = [
        'kode_kategori',
        'kode_supplier',
        'nama_produk',
        'gambar',
        'stock',
    ];

    public function detailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::class, 'kode_produk', 'kode_produk');
    }

    public function levelHarga()
    {
        return $this->hasMany(LevelHarga::class, 'kode_produk', 'kode_produk');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class, 'kode_kategori', 'kode_kategori');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'kode_supplier', 'id');
    }
}
