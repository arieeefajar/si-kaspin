<?php

namespace App\Http\Controllers\api\product;

use App\Events\OrderPlaced;
use App\Http\Controllers\Controller;
use App\Models\DetailPenjualan;
use App\Models\DetailReturPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\ReturPenjualan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class ProductController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori', 'levelHarga')->whereHas('levelHarga', function ($query) {
            $query->where('nama_level', 'Ecer');
        })->get();
        return response()->json($produk);
    }

    public function store(Request $request)
    {
        // $data = $request->all();
        $detailPenjualan = $request->detailPenjualan;

        // generate kode
        $getKode = Penjualan::latest()->first();
        $kode = "TRP-";
        if (
            $getKode == null
        ) {
            $kode .= "00001";
        } else {
            $lastNumber = (int) str_replace('TRP-', '', $getKode->kode_penjualan);
            $kode .= sprintf("%05d", $lastNumber + 1);
        }

        $penjualan = new Penjualan();
        $penjualan->kode_penjualan = $kode;
        $penjualan->kode_operator = $request->id;
        $penjualan->kode_pelanggan = $request->kodePelanggan;
        $penjualan->total = $request->total;
        $penjualan->bayar = $request->bayar;
        $penjualan->kembalian = $request->kembalian;

        $details = [];
        foreach ($detailPenjualan as $index => $item) {
            $detail = new DetailPenjualan();
            $detail->kode_penjualan = $kode;
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

    public function storeRetur(Request $request)
    {
        $detailRetur = $request->detailRetur;

        // generate kode
        $getKode = ReturPenjualan::latest()->first();
        $kode = "RTP-";
        if (
            $getKode == null
        ) {
            $kode .= "00001";
        } else {
            $lastNumber = (int) str_replace('RTP-', '', $getKode->kode_retur);
            $kode .= sprintf("%05d", $lastNumber + 1);
        }

        $retur = new ReturPenjualan();
        $retur->kode_retur = $kode;
        $retur->kode_operator = $request->id;
        $retur->kode_pelanggan = $request->kodePelanggan;
        $retur->total = $request->total;
        $retur->bayar = $request->bayar;
        $retur->kembalian = $request->kembalian;

        $details = [];
        foreach ($detailRetur as $index => $item) {
            $detail = new DetailReturPenjualan();
            $detail->kode_retur = $kode;
            $detail->kode_produk = $item['kodeProduk'];
            $detail->jumlah = $item['jumlah'];
            $detail->subtotal = $item['subtotal'];
            $details[] = $detail;
        }

        try {
            DB::beginTransaction();
            $retur->save();
            foreach ($details as $detail) {
                $detail->save();

                $produk = Produk::where('kode_produk', $detail->kode_produk)->first();
                if ($produk) {
                    $produk->stock += $detail->jumlah;
                    $produk->save();
                }
            }
            DB::commit();
            return $this->sendMassage('Order Success', 200, 'success');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendMassage($th->getMessage(), 500, 'failed');
        }
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
