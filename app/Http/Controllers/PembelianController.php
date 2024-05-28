<?php

namespace App\Http\Controllers;

use App\Events\TransaksiPembelian;
use App\Models\DetailPembelian;
use App\Models\Pembelian;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PembelianController extends Controller
{
    public function index()
    {
        $produk = Produk::join('kategori_produks', 'produks.kode_kategori', '=', 'kategori_produks.kode_kategori')->join('level_hargas', 'produks.kode_produk', '=', 'level_hargas.kode_produk')->select('produks.*', 'kategori_produks.nama_kategori', 'level_hargas.harga_satuan')->where('level_hargas.nama_level', 'grosir')->get();
        return view('transaksi.pembelian', compact('produk'));
    }

    public function store(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'total' => 'required',
            'bayar' => 'required',
            'kembalian' => 'required',
        ]);

        if ($validator->fails()) {
            alert()->error('Gagal', $validator->errors()->first());
            return redirect()->back();
        }

        // generate kode
        $getKode = Pembelian::latest()->first();
        $kode = "TRS-";
        if ($getKode == null) {
            $kode .= "00001";
        } else {
            $lastNumber = (int) str_replace('TRS-', '', $getKode->kode_pembelian);
            $kode .= sprintf("%05d", $lastNumber + 1);
        }

        $pembelian = new Pembelian();
        $pembelian->kode_pembelian = $kode;
        $pembelian->kode_operator = Auth::user()->id;
        $pembelian->total = $request->total;
        $pembelian->bayar = $request->bayar;
        $pembelian->kembalian = $request->kembalian;

        $details = [];
        foreach ($request->kode_produk as $index => $kode_produk) {
            $detail = new DetailPembelian();
            $detail->kode_pembelian = $kode;
            $detail->kode_produk = $kode_produk;
            $detail->jumlah = $request->jumlah[$index];
            $detail->subtotal = $request->subtotal[$index];
            $details[] = $detail;
        }

        try {
            $pembelian->save();
            foreach ($details as $detail) {
                $detail->save();
            }

            event(new TransaksiPembelian($pembelian, $details));

            alert()->success('Berhasil', 'Transaksi Pembelian Berhasil');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th->getMessage());
            return redirect()->back();
        }
    }
}
