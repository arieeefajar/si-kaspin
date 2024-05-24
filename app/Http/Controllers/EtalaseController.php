<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Database\Seeders\ProdukSeeder;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class EtalaseController extends Controller
{
    public function index()
    {
        $etalase = Produk::join('kategori_produks', 'produks.kode_kategori', '=', 'kategori_produks.kode_kategori')
            ->join('level_hargas', 'produks.kode_produk', '=', 'level_hargas.kode_produk')
            ->select('produks.*', 'kategori_produks.nama_kategori', 'level_hargas.harga_satuan')
            ->where('level_hargas.nama_level', 'ecer')->paginate(10);
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
        $etalase = Produk::where('nama_produk', 'like', "%" . $nama_produk . "%")->paginate(3);
        return view('etalase', compact('etalase'));
    }
}
