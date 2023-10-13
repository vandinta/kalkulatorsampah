<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sampah;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class SampahController extends Controller
{
    public function index()
    {
        $no = 1;
        $sampah = Sampah::all();
        return view('cms.sampah.index', compact('no', 'sampah'));
    }

    public function show(Sampah $sampah)
    {
        return view('cms.sampah.show', compact('sampah'));
    }

    public function create()
    {
        return view('cms.sampah.tambah');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'harga' => 'required|numeric',
                'deskripsi' => 'required',
                'foto' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $sampah = sampah::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->foto,
        ]);

        if ($sampah) {
            Session::flash('berhasil', 'Berhasil Menambah');
            return redirect()->route('sampah.index');
        }
        Session::flash('gagal', 'gagal Menambah');
        return redirect()->back();
    }

    public function edit(sampah $sampah)
    {
        return view('cms.sampah.edit', compact('sampah'));
    }

    public function update(Request $request, Sampah $sampah)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'harga' => 'required|numeric',
                'deskripsi' => 'required',
                'foto' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $sampah->update($request->all());

        if ($sampah) {
            Session::flash('berhasil', 'Berhasil Mengubah');
            return redirect()->route('sampah.index');
        }

        Session::flash('gagal', 'gagal Mengubah');
        return redirect()->back();
    }

    public function destroy(Sampah $sampah)
    {
        $sampah->delete();

        if ($sampah) {
            Session::flash('berhasil', 'Berhasil Menghapus Sampah');
            return redirect()->route('sampah.index');
        }

        Session::flash('gagal', 'gagal Menghapus Sampah');
        return redirect()->back();
    }
}
