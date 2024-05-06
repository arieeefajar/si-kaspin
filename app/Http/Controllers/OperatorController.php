<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OperatorController extends Controller
{
    public function index()
    {
        $operator = User::all();
        return view('operator', compact('operator'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:25|string',
            'username' => 'required|max:12|string',
            'password' =>  'required|max:12|string',
            'role' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect('/operator')->with('error', $validator->errors()->first());
        }

        $operator = new User();
        $operator->nama = $request->nama;
        $operator->username = $request->username;
        $operator->password = Hash::make($request->password);
        $operator->role = $request->role;

        try {
            $operator->save();
            return redirect('/operator')->with('success', 'Data Berhasiltahui');
        } catch (\Throwable $th) {
            dd($th);
        };
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:25|string',
            'username' => 'required|max:12|string',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/operator')->with('error', $validator->errors()->first());
        }

        $operator = User::find($id);
        $operator->nama = $request->nama;
        $operator->username = $request->username;
        $operator->role = $request->role;

        try {
            $operator->save();
            return redirect('/operator')->with('success', 'Data Berhasil diberbarui');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function destroy($id)
    {
        $operator = User::find($id);
        $operator->delete();
        return redirect('/operator')->with('success', 'Data Berhasiltahui');
    }
}
