<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReturPenjualanController extends Controller
{
    public function index()
    {
        return view('returPenjualan');
    }
}
