<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class TransaksiController extends Controller
{
    public function index()
    {
        $no = 1;
        $transaksi = Transaksi::join('tb_sampah', 'tb_transaksi.id_sampah', '=', 'tb_sampah.id')->select('tb_transaksi.*', 'tb_sampah.nama as sampah')->get();
        return view('cms.transaksi.index', compact('no', 'transaksi'));
    }

    public function show(Transaksi $transaksi)
    {
        $sampah = Sampah::all();
        return view('cms.transaksi.show', compact('sampah', 'transaksi'));
    }

    public function create()
    {
        $sampah = Sampah::all();
        return view('cms.transaksi.tambah', compact('sampah'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'id_sampah' => 'required',
                'berat' => 'required|numeric',
                'harga_hide' => 'required',
                'status' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $transaksi = Transaksi::create([
            'nama' => $request->nama,
            'id_sampah' => $request->id_sampah,
            'berat' => $request->berat,
            'harga' => $request->harga_hide,
            'status' => $request->status,
        ]);

        if ($transaksi) {
            Session::flash('berhasil', 'Berhasil Menambah');
            return redirect()->route('transaksi.index');
        }
        Session::flash('gagal', 'gagal Menambah');
        return redirect()->back();
    }

    public function edit(Transaksi $transaksi)
    {
        $sampah = Sampah::all();
        return view('cms.transaksi.edit', compact('sampah', 'transaksi'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'id_sampah' => 'required',
                'berat' => 'required|numeric|min:0',
                'harga_hide' => 'required',
                'status' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $transaksi->update([
            'nama' => $request->nama,
            'id_sampah' => $request->id_sampah,
            'berat' => $request->berat,
            'harga' => $request->harga_hide[0],
            'status' => $request->status,
        ]);

        if ($transaksi) {
            Session::flash('berhasil', 'Berhasil Mengubah');
            return redirect()->route('transaksi.index');
        }

        Session::flash('gagal', 'gagal Mengubah');
        return redirect()->back();
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        if ($transaksi) {
            Session::flash('berhasil', 'Berhasil Menghapus transaksi');
            return redirect()->route('transaksi.index');
        }

        Session::flash('gagal', 'gagal Menghapus transaksi');
        return redirect()->back();
    }

    public function jual(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'id_sampah' => 'required',
                'berat' => 'required|numeric|min:0',
                'harga_hide' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $transaksi = Transaksi::create([
            'nama' => $request->nama,
            'id_sampah' => $request->id_sampah,
            'berat' => $request->berat,
            'harga' => $request->harga_hide[0],
        ]);

        if ($transaksi) {
            Session::flash('berhasil', 'Berhasil Menambah');
            return redirect()->route('jual');
        }
        Session::flash('gagal', 'gagal Menambah');
        return redirect()->back();
    }
}
