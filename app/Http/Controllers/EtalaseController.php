<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class EtalaseController extends Controller
{
    public function index()
{
        $products = produk::all();
        return view('etalase', compact('products'));
    
}


}
