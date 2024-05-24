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

        // generate kode
        $getKode = Supplier::latest()->first();
        $kode = "SPL-";

        if ($getKode == null) {
            $nomorUrut = "0001";
        } else {
            $nomorUrut = substr($getKode->kode_supplier, 4, 4) + 1;
            $nomorUrut = "000" . $nomorUrut;
        }
        $kode_supplier = $kode . $nomorUrut;

        $supplier = new Supplier();
        $supplier->kode_supplier = $kode_supplier;
        $supplier->nama = $request->nama;
        $supplier->no_hp = $request->no_hp;

        try {
            $supplier->save();
            alert()->success('Berhasil', 'Data Supplier berhasil ditambahkan');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $kode_supplier)
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
            return redirect()->back()->withInput();
        }

        try {
            Supplier::where('kode_supplier', $kode_supplier)->update([
                'nama' => $request->nama,
                'no_hp' => $request->no_hp
            ]);
               alert()->success('Berhasil', 'Data Supplier Berhasil diubah');
            return redirect()->back();
    } catch (\Throwable $th) {
        alert()->error('Gagal', $th);
        return redirect()->back()->withInput();
    }
    }

    public function destroy($id)
    {
        try {
            $query = Supplier::where('kode_supplier', $id);
            $query->delete();
            alert()->success('Berhasil', 'Data Supplier Berhasil dihapus');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Gagal', $th->getMessage());
            return redirect()->back();
        }
    }
}