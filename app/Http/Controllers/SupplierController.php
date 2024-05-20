<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::all();
        return view('supplier', compact('supplier'));
    }

    public function store(Request $request)
    {

        // dd($request->all());

        $customMessage = [
            'nama.required' => 'Nama harus diisi',
            'nama.max' => 'Nama maksimal :max karakter',
            'nama.string' => 'Nama harus berupa string',

            'no_hp.required' => 'No Hp harus diisi',
            'no_hp.max' => 'No Hp maksimal :max digit',
            'no_hp.min' => 'No Hp minimal :min digit',
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:25|string',
            'no_hp' => 'required|min:11|max:16',
        ], $customMessage);


        if ($validator->fails()) {
            alert()->error('Gagal', $validator->messages()->all()[0]);
            return redirect()->back()->withInput();
        }

        $supplier = new Supplier();
        $supplier->nama = $request->nama;
        $supplier->no_hp = $request->no_hp;

        try {
            $supplier->save();
            return redirect('/supplier')->with('success', 'Data Berhasil ditambahkan');
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

            'no_hp.required' => 'No Hp harus diisi',
            'no_hp.max' => 'No Hp maksimal :max digit',
            'no_hp.min' => 'No Hp minimal :min digit',
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:25|string',
            'no_hp' => 'required|min:11|max:16',
        ], $customMessage);

        if ($validator->fails()) {
            alert()->error('Gagal', $validator->messages()->all()[0]);
            return redirect()->back();
        }

        $supplier = Supplier::find($id);
        $supplier->nama = $request->nama;
        $supplier->no_hp = $request->no_hp;

        try {
            $supplier->save();
            return redirect('/supplier')->with('success', 'Data Berhasil diberbarui');
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th);
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            alert()->error('Gagal', 'Supplier tidak di temukan');
            return redirect()->route('supplier')->with('error', 'Supplier not found.');
        }

        try {
            $supplier->delete();
            alert()->success('Berhasil', 'Data Berhasil dihapus');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th);
            return redirect()->back();
        }
    }
}