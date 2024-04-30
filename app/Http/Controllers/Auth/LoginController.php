<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function prosesLogin(LoginRequest $request) {
        $data = $request->validated();
        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('error', 'Username / Password Anda Tidak Sesuai');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
