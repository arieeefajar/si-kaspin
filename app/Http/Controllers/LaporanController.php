<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::with('details.produk.levelHarga', 'operator')->get();
        $pembelian = Pembelian::with('details.produk.levelHarga', 'operator')->get();
        return view('laporan', compact('penjualan', 'pembelian'));
    }
}
