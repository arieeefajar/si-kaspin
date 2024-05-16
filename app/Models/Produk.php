<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'gambar',
        'stock',
    ];

    public function levelHarga()
    {
        $levelHarga = LevelHarga::join('produks', 'level_hargas.kode_produks', '=', 'produks.kode_produk')->select('level_hargas.*', 'produks.*')->get();

        return $levelHarga;
    }

}
