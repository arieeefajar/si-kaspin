<?php

namespace App\Http\Controllers;

use App\Models\LevelHarga;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index()
    {
        $produk = Produk::join('kategori_produks', 'produks.kode_kategori', '=', 'kategori_produks.kode_kategori')->join('level_hargas', 'produks.kode_produk', '=', 'level_hargas.kode_produk')->select('produks.*', 'kategori_produks.nama_kategori', 'level_hargas.harga_satuan')->where('level_hargas.nama_level', 'ecer')->get();
        return view('penjualan', compact('produk'));
    }

    public function getLevelHarga($id)
    {
        $levelHarga = LevelHarga::where('kode_produk', $id)->get();
        return response()->json($levelHarga);
    }

    public function getHarga($id)
    {
        $levelHarga = LevelHarga::where('kode_level', $id)->get();
        return response()->json($levelHarga);
    }
}
