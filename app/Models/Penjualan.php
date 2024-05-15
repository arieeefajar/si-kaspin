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
}
