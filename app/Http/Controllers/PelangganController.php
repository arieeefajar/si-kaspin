<?php

namespace App\Http\Controllers;

use App\Models\RekapPelanggan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{
    public function index()
    {
        //$pelanggan = RekapPelanggan::join('pelanggans', 'rekap_pelanggan.kode_pelanggan', '=', 'pelanggans.kode_pelanggan')->select('pelanggans.*', 'rekap_pelanggans.*')->get();
        $pelanggan = Pelanggan::all();
        return view('pelanggan', compact('pelanggan'));
    }

    public function store(Request $request)
    {
       // dd($request->all());
        // custom message
        $customMessage = [
            'nama_pelanggan.required' => 'Harap isi nama pelanggan',
            'nama_pelanggan.max' => 'Nama pelanggan maksimal :max karakter',
            'nama_pelanggan.string' => 'Harap isi nama pelanggan dengan benar',

            'alamat.required' => 'Harap isi alamat',
            'alamat.max' => 'Alamat maksimal :max karakter',
            'alamat.string' => 'Harap isi alamat pelanggan dengan benar',

            'no_hp.required' => 'Harap isi No Hp',
            'no_hp.max' => 'No Hp maksimal :max digit',
            'no_hp.min' => 'No Hp minimal :min digit',
           
        ];

        // validation
        $validator = Validator::make($request->all(), [
            'nama_pelanggan' => 'required|max:25|string',
            'alamat' => 'required|max:50|string',
            'no_hp' => 'required|min:11|max:16',
        ], $customMessage);

        // cek validation
        if ($validator->fails()) {
            alert()->error('Gagal', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        // generate kode
        $getKode = Pelanggan::latest()->first();
        $kode = "PLG-";

        if ($getKode == null) {
            $nomorUrut = "0001";
        } else {
            $nomorUrut = substr($getKode->kode_pelanggan, 4, 4) + 1;
            $nomorUrut = "000" . $nomorUrut;
        }
        $kode_pelanggan = $kode . $nomorUrut;

        // insert data
        $pelanggan = new Pelanggan();
        $pelanggan->kode_pelanggan = $kode_pelanggan;
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_hp = $request->no_hp;

        // simpan
        try {
            $pelanggan->save();
            alert()->success('Berhasil', 'Data pelanggan berhasil ditambahkan');
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
           'nama_pelanggan.required' => 'Harap isi nama pelanggan',
            'nama_pelanggan.max' => 'Nama pelanggan maksimal :max karakter',
            'nama_pelanggan.string' => 'Harap isi nama pelanggan dengan benar',

            'alamat.required' => 'Harap isi alamat',
            'alamat.max' => 'Alamat maksimal :max karakter',
            'alamat.string' => 'Harap isi alamat pelanggan dengan benar',

            'no_hp.required' => 'Harap isi No Hp',
            'no_hp.max' => 'No Hp maksimal :max digit',
            'no_hp.min' => 'No Hp minimal :min digit',
           
        ];

        // validation
        $validator = Validator::make($request->all(), [
            'nama_pelanggan' => 'required|max:25|string',
            'alamat' => 'required|max:50|string',
            'no_hp' => 'required|min:11|max:16',
        ], $customMessage);


        // cek validation
        if ($validator->fails()) {
            alert()->error('Gagal', $validator->errors()->first());
            return redirect()->back();
        }

        try {
            Pelanggan::where('kode_pelanggan', $id)->update([
                'nama_pelanggan' => $request->nama_pelanggan,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp
            ]);
               alert()->success('Berhasil', 'Data Pelanggan Berhasl diubah');
            return redirect()->back();
    } catch (\Throwable $th) {
        alert()->error('Gagal', $th);
        return redirect()->back();
    }}

    public function destroy($id)
    {
       try {
            $query = Pelanggan::where('kode_pelanggan', $id);
            $query->delete();
            alert()->success('Berhasil', 'Pelanggan Berhasil dihapus');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th->getMessage());
            return redirect()->back();
        }
    }
}