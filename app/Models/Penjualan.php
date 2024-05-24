<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $filable = [
        'kode_operator',
        'total',
        'bayar',
        'kembalian',
    ];

    public function details()
    {
        return $this->hasMany(DetailPenjualan::class, 'kode_penjualan', 'kode_penjualan');
    }

    public function operator()
    {
        return $this->belongsTo(User::class, 'kode_operator', 'id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'kode_pelanggan', 'kode_pelanggan');
    }
}
