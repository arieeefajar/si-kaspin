<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return response()->json($pelanggan);
    }

    public function store(Request $request)
    {
        // generate kode
        $getKode = Pelanggan::latest()->first();
        $kode = "PLG-";
        if (
            $getKode == null
        ) {
            $kode .= "00001";
        } else {
            $lastNumber = (int) str_replace('PLG-', '', $getKode->kode_pelanggan);
            $kode .= sprintf("%05d", $lastNumber + 1);
        }

        $pelanggan = new Pelanggan();
        $pelanggan->kode_pelanggan = $kode;
        $pelanggan->nama_pelanggan = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_hp = $request->telepon;

        try {
            $pelanggan->save();
            return $this->sendMassage('Pelanggan Berhasil ditambahkan', 200, 'success');
        } catch (\Throwable $th) {
            return $this->sendMassage($th->getMessage(), 400, 'error');
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
