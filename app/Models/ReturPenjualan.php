<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturPenjualan extends Model
{
    use HasFactory;

    protected $filable = [
        'kode_operator',
        'kode_pelanggan',
        'total',
        'bayar',
        'kembalian',
    ];
}
