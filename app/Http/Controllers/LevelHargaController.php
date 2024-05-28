<?php

namespace App\Http\Controllers;

use App\Models\LevelHarga;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LevelHargaController extends Controller
{
    public function index()
    {
        $levelharga = LevelHarga::join('produks', 'produks.kode_produk', '=', 'level_hargas.kode_produk')->orderBy('level_hargas.kode_level', 'asc')->select('level_hargas.*', 'produks.*')->get();
        $produk = Produk::all();
        return view('levelHarga', compact('levelharga', 'produk'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // custom message
        $customMessage = [
            'kode_produk.required' => 'Harap pilih nama produk',

            'nama_level.required' => 'Harap isi nama level',
            'nama_level.string' => 'Harap isi nama level dengan huruf',
            'nama_level.max' => 'Nama level maksimal :max karakter',

            'harga_satuan1.required' => 'Harap isi harga satuan',
            'harga_satuan1.numeric' => 'Harap isi harga satuan dengan angka',
        ];

        // validation
        $validator = Validator::make($request->all(), [
            'kode_produk' => 'required',
            'nama_level' => 'required|string|max:25',
            'harga_satuan1' => 'required|numeric',
        ], $customMessage);

        // cek validation
        if ($validator->fails()) {
            alert()->error('Gagal', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        // generate kode
        $getKode = LevelHarga::latest()->first();
        $kode = "LVH-";
        if ($getKode == null) {
            $kode .= "00001";
        } else {
            $lastNumber = (int) str_replace('LVH-', '', $getKode->kode_level);
            $kode .= sprintf("%05d", $lastNumber + 1);
        }

        // insert data
        $levelharga = new LevelHarga();
        $levelharga->kode_level = $kode;
        $levelharga->kode_produk = $request->kode_produk;
        $levelharga->nama_level = $request->nama_level;
        $levelharga->harga_satuan = $request->harga_satuan1;

        try {
            $levelharga->save();
            alert()->success('Berhasil', 'Data Berhasil ditambahkan');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        // custom message
        $customMessage = [
            'kode_produk.required' => 'Harap pilih nama produk',

            'nama_level.required' => 'Harap isi nama level',
            'nama_level.string' => 'Harap isi nama level dengan huruf',
            'nama_level.max' => 'Nama level maksimal :max karakter',

            'harga_satuan1.required' => 'Harap isi harga satuan',
            'harga_satuan1.numeric' => 'Harap isi harga satuan dengan angka',
        ];

        //validator
        $validator = Validator::make($request->all(), [
            'kode_produk' => 'required',
            'nama_level' => 'required|string|max:25',
            'harga_satuan1' => 'required|numeric',
        ], $customMessage);

        if ($validator->fails()) {
            alert()->error('Gagal', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        try {
            LevelHarga::where('kode_level', $id)->update([
                'kode_produk' => $request->kode_produk,
                'nama_level' => $request->nama_level,
                'harga_satuan' => $request->harga_satuan1,
            ]);
            alert()->success('Berhasil', 'Data Berhasil diubah');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            LevelHarga::where('kode_level', $id)->delete();
            alert()->success('Berhasil', 'Data Berhasil dihapus');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th->getMessage());
            return redirect()->back();
        }
    }
}
