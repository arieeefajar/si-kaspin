<?php

namespace App\Http\Controllers\api\product;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori', 'levelHarga')->get();
        return response()->json($produk);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        return $this->sendMassage($data, 200, 'success');
    }

    public function sendMassage($text, $kode, $status)
    {
        return response()->json([
            'data' => $text,
            'code' => $kode,
            'status' => $status
        ], $kode);
    }
}
