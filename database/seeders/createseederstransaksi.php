<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;

class createseederstransaksi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            Transaksi::create([
                'nama' => 'Satimin',
                'id_sampah' => 1,
                'berat' => 2,
                'harga' => 60000,
                'status' => 'Done',
            ]);
            Transaksi::create([
                'nama' => 'Juminem',
                'id_sampah' => 2,
                'berat' => 2,
                'harga' => 75000,
                'status' => 'Done',
            ]);
            Transaksi::create([
                'nama' => 'Roberto',
                'id_sampah' => 3,
                'berat' => 2,
                'harga' => 85000,
                'status' => 'Panding',
            ]);
            Transaksi::create([
                'nama' => 'Saitin',
                'id_sampah' => 1,
                'berat' => 3,
                'harga' => 85000,
                'status' => 'Panding',
            ]);
        });
    }
}
