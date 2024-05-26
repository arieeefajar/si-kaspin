<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Custom message for validation
        $customMessage = [
            'nama.required' => 'Nama harus diisi',
            'nama.max' => 'Nama maksimal :max karakter',
            'nama.string' => 'Nama harus berupa string',

            'username.required' => 'Username harus diisi',
            'username.max' => 'Username maksimal :max karakter',
            'username.string' => 'Username harus berupa string',
        ];

        // Validate request data
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:25|string',
            'username' => 'required|max:12|string',
        ], $customMessage);

        if ($validator->fails()) {
            alert()->error('Gagal', $validator->messages()->all()[0]);
            return redirect()->back();
        }

        // Get user by id
        $user = User::findOrFail($id);
        $user->nama = $request->nama;
        $user->username = $request->username;

        try {
            $user->save(); // Save changes to database
            return redirect('/profile')->with('success', 'Data Berhasil diperbarui');
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th);
            return redirect()->back();
        }
    }
}



