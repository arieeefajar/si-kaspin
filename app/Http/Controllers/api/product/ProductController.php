<?php

namespace App\Http\Controllers\api\product;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $produk = KategoriProduk::join('produks', 'kategori_produks.kode_kategori', '=', 'produks.kode_kategori')->select('produks.*', 'kategori_produks.*')->get();
        $kategori = DB::table('kategori_produks')->get();
        return response()->json(['data' => $produk]);
    }
}
