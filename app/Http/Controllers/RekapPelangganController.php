<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\RekapPelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapPelangganController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->tahun;

        if ($tahun != null) {
            $rekap = Penjualan::select('penjualans.*')
                ->join('pelanggans', 'penjualans.kode_pelanggan', '=', 'pelanggans.kode_pelanggan')
                ->whereYear('pelanggans.created_at', $tahun)
                ->with('pelanggan')
                ->get();

            return view('rekapPelanggan', compact('rekap', 'tahun'));
        } else {
            $rekap = Penjualan::with(['pelanggan' => function ($query) {
                $query->orderBy(DB::raw('YEAR(created_at)'), 'asc');
            }])->get();
            return view('rekapPelanggan', compact('rekap'));
        }
    }
}
