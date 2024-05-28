<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function prosesLogin(LoginRequest $request)
    {
        $data = $request->validated();
        $user = User::where('username', $data['username'])->first();
        if ($user && Hash::check($data['password'], $user->password)) {

            if ($user->role === 'admin') {
                Auth::login($user);
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->with('error', 'Username atau Password Anda Tidak Sesuai');
            }
        }

        return redirect()->back()->withErrors(['username' => 'Username atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
