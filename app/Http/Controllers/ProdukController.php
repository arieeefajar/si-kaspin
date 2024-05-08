<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        $kategori = KategoriProduk::all();
        return view('produk', compact('produk', 'kategori'));
    }

    public function store(Request $request)
    {
        // custom message
        $customMessage = [
            'kode_kategori.required' => 'Harap pilih kategori',

            'nama_produk.required' => 'Harap isi nama produk',
            'nama_produk.max' => 'Nama produk maksimal :max karakter',
            'nama_produk.string' => 'Harap isi nama produk dengan benar',

            'gambar.required' => 'Harap pilih gambar',
            'gambar.image' => 'File yang diunggah harus berupa gambar',
            'gambar.mimes' => 'Harap pilih gambar dengan format :values',
            'gambar.max' => 'Ukuran gambar maksimal :max Kb',

        ];

        // validation
        $validator = Validator::make($request->all(), [
            'kode_kategori' => 'required',
            'nama_produk' => 'required|max:25|string',
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ], $customMessage);

        // cek validation
        if ($validator->fails()) {
            alert()->error('Gagal', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        // generate kode
        $getKode = Produk::latest()->first();
        $kode = "PRD-";

        if ($getKode == null) {
            $nomorUrut = "0001";
        } else {
            $nomorUrut = substr($getKode->kode_produk, 4, 4) + 1;
            $nomorUrut = "000" . $nomorUrut;
        }
        $kode_produk = $kode . $nomorUrut;

        // upload gambar
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/gamabarProduk', $gambar->hashName());

        // insert data
        $produk = new Produk();
        $produk->kode_produk = $kode_produk;
        $produk->kode_kategori = $request->kode_kategori;
        $produk->nama_produk = $request->nama_produk;
        $produk->gambar = $gambar->hashName();

        // simpan
        try {
            $produk->save();
            alert()->success('Berhasil', 'Data produk berhasil ditambahkan');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        // custom message
        $customMessage = [
            'kode_kategori.required' => 'Harap pilih kategori',

            'nama_produk.required' => 'Harap isi nama produk',
            'nama_produk.max' => 'Nama produk maksimal :max karakter',
            'nama_produk.string' => 'Harap isi nama produk dengan benar',

            'gambar.required' => 'Harap pilih gambar',
            'gambar.image' => 'File yang diunggah harus berupa gambar',
            'gambar.mimes' => 'Harap pilih gambar dengan format :values',
            'gambar.max' => 'Ukuran gambar maksimal :max Kb',

        ];

        // validation
        $validator = Validator::make($request->all(), [
            'kode_kategori' => 'required',
            'nama_produk' => 'required|max:25|string',
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ], $customMessage);

        // cek validation
        if ($validator->fails()) {
            alert()->error('Gagal', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        // upload gambar
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/gamabarProduk', $gambar->hashName());

        try {
            Produk::where('kode_produk', $id)->update([
                'kode_kategori' => $request->kode_kategori,
                'nama_produk' => $request->nama_produk,
                'gambar' => $gambar->hashName(),
            ]);
            alert()->success('Berhasil', 'Data produk berhasil diubah');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $query = Produk::where('kode_produk', $id);
            $query->delete();
            alert()->success('Berhasil', 'Produk Berhasil dihapus');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th->getMessage());
            return redirect()->back();
        }
    }
}
