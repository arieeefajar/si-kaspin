<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;


class RekapPelangganController extends Controller
{
    public function index()
    {
        return view('rekapPelanggan');
    }
}