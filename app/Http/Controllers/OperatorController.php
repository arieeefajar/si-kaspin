<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

class OperatorController extends Controller
{
    public function index()
    {
        $operator = User::all();
        return view('operator', compact('operator'));
    }

    public function store(Request $request)
    {

        $customMessage = [
            'nama.required' => 'Nama harus diisi',
            'nama.max' => 'Nama maksimal :max karakter',
            'nama.string' => 'Nama harus berupa string',

            'username.required' => 'Username harus diisi',
            'username.max' => 'Username maksimal :max karakter',
            'username.string' => 'Username harus berupa string',

            'password.required' => 'Password harus diisi',
            'password.max' => 'Password maksimal :max karakter',
            'password.string' => 'Password harus berupa string',

            'role.required' => 'Role harus diisi',
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:25|string',
            'username' => 'required|max:12|string',
            'password' =>  'required|max:12|string',
            'role' => 'required',
        ], $customMessage);


        if ($validator->fails()) {
            alert()->error('Gagal', $validator->messages()->all()[0]);
            return redirect()->back()->withInput();
        }

        $operator = new User();
        $operator->nama = $request->nama;
        $operator->username = $request->username;
        $operator->password = Hash::make($request->password);
        $operator->role = $request->role;

        try {
            $operator->save();
            return redirect('/operator')->with('success', 'Data Berhasil ditambahkan');
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th);
            return redirect()->back()->withInput();
        };
    }

    public function update(Request $request, $id)
    {
        $customMessage = [
            'nama.required' => 'Nama harus diisi',
            'nama.max' => 'Nama maksimal :max karakter',
            'nama.string' => 'Nama harus berupa string',

            'username.required' => 'Username harus diisi',
            'username.max' => 'Username maksimal :max karakter',
            'username.string' => 'Username harus berupa string',

            'role.required' => 'Role harus diisi',
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:25|string',
            'username' => 'required|max:12|string',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            alert()->error('Gagal', $validator->messages()->all()[0]);
            return redirect()->back();
        }

        $operator = User::find($id);
        $operator->nama = $request->nama;
        $operator->username = $request->username;
        $operator->role = $request->role;

        try {
            $operator->save();
            return redirect('/operator')->with('success', 'Data Berhasil diberbarui');
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th);
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $operator = User::find($id);

        if (!$operator) {
            alert()->error('Gagal', 'Operator tidak di temukan');
            return redirect()->route('operator')->with('error', 'Operator not found.');
        }

        try {
            $operator->delete();
            alert()->success('Berhasil', 'Data Berhasil dihapus');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th);
            return redirect()->back();
        }
    }
}
