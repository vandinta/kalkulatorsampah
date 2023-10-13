<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Sampah;

class createseederssampah extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            Sampah::create([
                'nama' => 'Kertas',
                'deskripsi' => 'Diterima dalam keadaan bersih',
                'foto' => 'default.jpg',
                'harga' => '60000',
            ]);
            Sampah::create([
                'nama' => 'Plastik',
                'deskripsi' => 'Diterima dalam keadaan bersih',
                'foto' => 'default.jpg',
                'harga' => '75000',
            ]);
            Sampah::create([
                'nama' => 'Logam',
                'deskripsi' => 'Diterima dalam keadaan bersih',
                'foto' => 'default.jpg',
                'harga' => '85000',
            ]);
            Sampah::create([
                'nama' => 'Kaca',
                'deskripsi' => 'Diterima dalam keadaan bersih',
                'foto' => 'default.jpg',
                'harga' => '85000',
            ]);
        });
    }
}
