<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\LevelHarga;
use Illuminate\Http\Request;

class EtalaseController extends Controller
{
    public function index()
    {
        $etalase = Produk::paginate(2);
        $etalase = LevelHarga::select('harga_satuan')->paginate(2);
        return view('etalase', compact('etalase'));
        $etalase = Produk::join('kategori_produks', 'produks.kode_kategori', '=', 'kategori_produks.kode_kategori')
        ->join('level_hargas', 'produks.kode_produk', '=', 'level_hargas.kode_produk')
        ->select('produks.*', 'kategori_produks.nama_kategori', 'level_hargas.harga_satuan')
        ->where('level_hargas.nama_level', 'ecer')->get();
        return view('etalase', compact('etalase'));
    }

    public function search(Request $request)
    {
        $nama_produk = $request->input('cari');
        $etalase = Produk::where('nama_produk', 'like', "%".$nama_produk. "%")->paginate(2);
        return view('etalase', compact('etalase'));
    }
}
