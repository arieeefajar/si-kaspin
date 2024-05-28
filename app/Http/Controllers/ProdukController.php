<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function index()
    {
        // $produk = KategoriProduk::join('produks', 'kategori_produks.kode_kategori', '=', 'produks.kode_kategori')->select('produks.*', 'kategori_produks.*')->get();
        $produk = Produk::with('kategori', 'supplier')->get();
        $kategori = DB::table('kategori_produks')->get();
        $supplier = DB::table('suppliers')->get();
        return view('produk', compact('produk', 'kategori', 'supplier'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // custom message
        $customMessage = [
            'kode_kategori.required' => 'Harap pilih kategori',
            'kode_supplier.required' => 'Harap pilih supplier',

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
            'kode_supplier' => 'required',
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
            $kode .= "00001";
        } else {
            $lastNumber = (int) str_replace('PRD-', '', $getKode->kode_produk);
            $kode .= sprintf("%05d", $lastNumber + 1);
        }

        // upload gambar
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/gambarProduk', $gambar->hashName());

        // insert data
        $produk = new Produk();
        $produk->kode_produk = $kode;
        $produk->kode_kategori = $request->kode_kategori;
        $produk->kode_supplier = $request->kode_supplier;
        $produk->nama_produk = $request->nama_produk;
        $produk->gambar = $gambar->hashName();
        $produk->stock = 100;

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

        // custom message
        $customMessage = [
            'kode_kategori.required' => 'Harap pilih kategori',
            'kode_supplier.required' => 'Harap pilih supplier',

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
            'kode_supplier' => 'required',
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
        $gambar->storeAs('public/gambarProduk', $gambar->hashName());

        try {
            Produk::where('kode_produk', $id)->update([
                'kode_kategori' => $request->kode_kategori,
                'kode_supplier' => $request->kode_supplier,
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

    public function showStock()
    {
        $produk = KategoriProduk::join('produks', 'kategori_produks.kode_kategori', '=', 'produks.kode_kategori')->select('produks.*', 'kategori_produks.*')->get();
        return view('stockBarang', compact('produk'));
    }

    public function updateStock(Request $request, $id)
    {
        //custom message
        $customMessage = [
            'stock.required' => 'Harap isi stock',
            'stock.min' => 'Stock minimal :min',
            'stock.integer' => 'Stock harus berupa angka'
        ];

        //validation
        $validator = Validator::make($request->all(), [
            'stock' => 'required|min:1|integer',
        ], $customMessage);

        if ($validator->fails()) {
            alert()->error('Gagal', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        try {
            Produk::where('kode_produk', $id)->update([
                'stock' => $request->stock
            ]);
            alert()->success('Berhasil', 'Stock produk berhasil ditambahkan');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function stockLimit()
    {
        $produk = KategoriProduk::join('produks', 'kategori_produks.kode_kategori', '=', 'produks.kode_kategori')->select('produks.*', 'kategori_produks.*')->get();
        return view('stockLimit', compact('produk'));
    }
}
