<?php

namespace App\Http\Controllers;

use App\Events\ReturOrder;
use App\Models\DetailReturPenjualan;
use App\Models\Produk;
use App\Models\ReturPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReturPenjualanController extends Controller
{
    public function index()
    {
        $produk = Produk::join('kategori_produks', 'produks.kode_kategori', '=', 'kategori_produks.kode_kategori')->join('level_hargas', 'produks.kode_produk', '=', 'level_hargas.kode_produk')->select('produks.*', 'kategori_produks.nama_kategori', 'level_hargas.harga_satuan')->where('level_hargas.nama_level', 'grosir')->get();
        return view('returPenjualan', compact('produk'));
    }

    public function store(Request $request)
    {
        $customMessagae = [
            'kode_pelanggan.required' => 'Harap pilih nama pelanggan',
            'total.required' => 'Harap masukkan total',
            'bayar.required' => 'Harap masukkan bayar',
            'kembalian.required' => 'Harap masukkan kembalian',
        ];

        $validator  = Validator::make($request->all(), [
            'kode_pelanggan' => 'required',
            'total' => 'required',
            'bayar' => 'required',
            'kembalian' => 'required',
        ], $customMessagae);

        if ($validator->fails()) {
            alert()->error('Gagal', $validator->errors()->all()[0]);
            return redirect()->back()->withInput();
        }

        // generate kode
        $getKode = ReturPenjualan::latest()->first();
        $kode = "RTP-";
        if ($getKode == null) {
            $kode .= "00001";
        } else {
            $lastNumber = (int) str_replace('RTP-', '', $getKode->kode_retur);
            $kode .= sprintf("%05d", $lastNumber + 1);
        }

        $retur = new ReturPenjualan();
        $retur->kode_retur = $kode;
        $retur->kode_operator = Auth::user()->id;
        $retur->kode_pelanggan = $request->kode_pelanggan;
        $retur->total = $request->total;
        $retur->bayar = $request->bayar;
        $retur->kembalian = $request->kembalian;

        $details = [];
        foreach ($request->kode_produk as $index => $kode_produk) {
            $detail = new DetailReturPenjualan();
            $detail->kode_retur = $kode;
            $detail->kode_produk = $kode_produk;
            $detail->jumlah = $request->jumlah[$index];
            $detail->subtotal = $request->subtotal[$index];
            $details[] = $detail;
        }

        try {
            $retur->save();
            foreach ($details as $detail) {
                $detail->save();

                $produk = Produk::where('kode_produk', $detail->kode_produk)->first();
                if ($produk) {
                    $produk->stock += $detail->jumlah;
                    $produk->save();
                }
            }

            alert()->success('Berhasil', 'Data retur penjualan berhasil ditambahkan');
            return redirect()->back();
        } catch (\Throwable $th) {
            // alert()->error('Gagal', 'Data retur penjualan gagal ditambahkan');
            dd($th);
            return redirect()->back()->withInput();
        }
    }
}
