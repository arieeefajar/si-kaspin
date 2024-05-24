<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    public function getPelanggan()
    {
        $pelanggan = Pelanggan::all();
        return response()->json($pelanggan);
    }
}
