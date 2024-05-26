<?php

namespace App\Http\Controllers;

use App\Events\OrderPlaced;
use App\Models\DetailPenjualan;
use App\Models\LevelHarga;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PenjualanController extends Controller
{
    public function index()
    {
        $produk = Produk::join('kategori_produks', 'produks.kode_kategori', '=', 'kategori_produks.kode_kategori')->join('level_hargas', 'produks.kode_produk', '=', 'level_hargas.kode_produk')->select('produks.*', 'kategori_produks.nama_kategori', 'level_hargas.harga_satuan')->where('level_hargas.nama_level', 'ecer')->where('produks.stock', '>', '0')->get();
        return view('transaksi/penjualan', compact('produk'));
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

    public function getPelanggan()
    {
        $pelanggan = Pelanggan::all();
        return response()->json($pelanggan);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_pelanggan' => 'required',
            'total' => 'required',
            'bayar' => 'required',
            'kembalian' => 'required'
        ]);

        if ($validator->fails()) {
            alert()->error('Gagal', $validator->errors()->first());
            return redirect()->back();
        }

        // generate kode
        $getKode = Penjualan::latest()->first();
        $kode = "TRP-";
        if ($getKode == null) {
            $kode .= "00001";
        } else {
            $lastNumber = (int) str_replace('TRP-', '', $getKode->kode_produk);
            $kode .= sprintf("%05d", $lastNumber + 1);
        }

        $penjualan = new Penjualan();
        $penjualan->kode_penjualan = $kode;
        $penjualan->kode_operator = auth()->user()->id;
        $penjualan->kode_pelanggan = $request->kode_pelanggan;
        $penjualan->total = $request->total;
        $penjualan->bayar = $request->bayar;
        $penjualan->kembalian = $request->kembalian;

        $details = [];
        foreach ($request->kode_produk as $index => $kode_produk) {
            $detail = new DetailPenjualan();
            $detail->kode_penjualan = $kode;
            $detail->kode_produk = $kode_produk;
            $detail->jumlah = $request->jumlah[$index];
            $detail->subtotal = $request->subtotal[$index];
            $details[] = $detail;
        }

        try {
            $penjualan->save();
            foreach ($details as $detail) {
                $detail->save();
            }
            $penjualan->load('details');
            event(new OrderPlaced($penjualan));

            alert()->success('Berhasil', 'Transaksi berhasil dilakukan');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th->getMessage());
            return redirect()->back();
        }
    }
}
