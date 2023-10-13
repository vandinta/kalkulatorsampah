<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sampah;
use App\Models\Transaksi;
use App\Charts\UserChart;

class DashboardController extends Controller
{
    public function home()
    {
        $no = 1;
        $sampah = Sampah::all();
        $transaksi = Transaksi::all();

        // $usersChart = new UserChart;
        // $usersChart->labels(['Jan', 'Feb', 'Mar']);
        // $usersChart->dataset('Users by trimester', 'line', [10, 25, 13]);
        // return view('users', [ 'usersChart' => $usersChart ] );

        return view('home', compact('no', 'transaksi', 'sampah'));
    }

    public function index()
    {
        return view('cms.dashboard');
    }

    public function showJualForm()
    {
        $sampah = Sampah::all();
        return view('jual', compact('sampah'));
    }

    public function showListTransaksi()
    {
        $no = 1;
        $transaksi = Transaksi::join('tb_sampah', 'tb_transaksi.id_sampah', '=', 'tb_sampah.id')->select('tb_transaksi.*', 'tb_sampah.nama as sampah')->get();
        return view('detail', compact('no' ,'transaksi'));
    }
}
