<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class EtalaseController extends Controller
{
    public function index()
    {
        $etalase = Produk::join('kategori_produks', 'produks.kode_kategori', '=', 'kategori_produks.kode_kategori')
            ->join('level_hargas', 'produks.kode_produk', '=', 'level_hargas.kode_produk')
            ->select('produks.*', 'kategori_produks.nama_kategori', 'level_hargas.harga_satuan')
            ->where('level_hargas.nama_level', 'ecer')->paginate(3);
        return view('etalase', compact('etalase'));
    }

    public function getProduk($id)
    {
        $etalase = Produk::where('nama_produk', $id)->get();
        return view('etalase', compact('etalase'));
    }

    public function search(Request $request)
    {
        $nama_produk = $request->input('cari');

        // Join dengan tabel kategori produk dan level harga
        $etalase = Produk::join('kategori_produks', 'produks.kode_kategori', '=', 'kategori_produks.kode_kategori')
            ->join('level_hargas', 'produks.kode_produk', '=', 'level_hargas.kode_produk')
            ->where('produks.nama_produk', 'like', "%" . $nama_produk . "%")
            ->select('produks.*', 'kategori_produks.nama_kategori', 'level_hargas.harga_satuan')
            ->paginate(3);

        return view('etalase', compact('etalase'));
    
    }
}
