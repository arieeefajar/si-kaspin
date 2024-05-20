<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $filable = [
        'kode_operator',
        'total',
        'bayar',
        'kembalian'
    ];

    public function details()
    {
        return $this->hasMany(DetailPembelian::class, 'kode_pembelian', 'kode_pembelian');
    }

    public function operator()
    {
        return $this->belongsTo(User::class, 'kode_operator', 'id');
    }
}
