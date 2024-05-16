<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class KategoriProdukController extends Controller
{
    public function index()
    {
        $kategori = KategoriProduk::all();
        return view('kategoriProduk', compact('kategori'));
    }

    public function store(Request $request)
    {
        $customMessage = [
            'nama_kategori.required' => 'Nama Kategori harus diisi',
            'nama_kategori.max' => 'Nama Kategori maksimal :max karakter',
            'nama_kategori.string' => 'Nama Kategori harus berupa string',
        ];

        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|max:25|string',
        ], $customMessage);

        if ($validator->fails()) {
            alert()->error('Gagal', $validator->messages()->all()[0]);
            return redirect()->back()->withInput();
        }

        $getKode = KategoriProduk::latest()->first();
        $kode = "KTGR-";

        if ($getKode == null) {
            $nomorUrut = "0001";
        } else {
            $nomorUrut = substr($getKode->kode_kategori, 5, 4) + 1;
            $nomorUrut = "000" . $nomorUrut;
        }
        $kode_kategori = $kode . $nomorUrut;

        $kategori = new KategoriProduk();
        $kategori->kode_kategori = $kode_kategori;
        $kategori->nama_kategori = $request->nama_kategori;

        try {
            $kategori->save();
            alert()->success('Berhasil', 'Kategori Produk Berhasil ditambahkan');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $kode_kategori)
    {
        $customMessage = [
            'nama_kategori.required' => 'Nama Kategori harus diisi',
            'nama_kategori.max' => 'Nama Kategori :max karakter',
            'nama_kategori.string' => 'Nama Kategori harus berupa string',
        ];

        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|max:25|string',
        ], $customMessage);

        if ($validator->fails()) {
            alert()->error('Gagal', $validator->messages()->all()[0]);
            return redirect()->back()->withInput();
        }

        try {
            KategoriProduk::where('kode_kategori', $kode_kategori)->update([
                'nama_kategori' => $request->nama_kategori
            ]);
            alert()->success('Berhasil', 'Kategori Produk Berhasil diubah');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $query = KategoriProduk::where('kode_kategori', $id);
            $query->delete();
            alert()->success('Berhasil', 'Kategori Produk Berhasil dihapus');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th->getMessage());
            return redirect()->back();
        }
    }
}
