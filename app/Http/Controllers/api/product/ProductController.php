<?php

namespace App\Http\Controllers\api\product;

use App\Events\OrderPlaced;
use App\Http\Controllers\Controller;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;
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
        $detailPenjualan = $request->detailPenjualan;

        // generate kode
        $getKode = Penjualan::latest()->first();
        $kode = "TRP-";

        if ($getKode == null) {
            $nomorUrut = "0001";
        } else {
            $nomorUrut = substr($getKode->kode_penjualan, 4, 4) + 1;
            $nomorUrut = "000" . $nomorUrut;
        }
        $kode_penjualan = $kode . $nomorUrut;

        $penjualan = new Penjualan();
        $penjualan->kode_penjualan = $kode_penjualan;
        $penjualan->kode_operator = $request->id;
        $penjualan->kode_pelanggan = $request->kodePelanggan;
        $penjualan->total = $request->total;
        $penjualan->bayar = $request->bayar;
        $penjualan->kembalian = $request->kembalian;

        $details = [];
        foreach ($detailPenjualan as $index => $item) {
            $detail = new DetailPenjualan();
            $detail->kode_penjualan = $kode_penjualan;
            $detail->kode_produk = $item['kodeProduk'];
            $detail->jumlah = $item['jumlah'];
            $detail->subtotal = $item['subtotal'];
            $details[] = $detail;
        }

        try {
            DB::beginTransaction();
            $penjualan->save();
            foreach ($details as $detail) {
                $detail->save();
            }
            event(new OrderPlaced($penjualan));
            DB::commit();
            return $this->sendMassage('Order Success', 200, 'success');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendMassage($th->getMessage(), 500, 'failed');
        }
        // return $this->sendMassage($data, 200, 'success');
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
