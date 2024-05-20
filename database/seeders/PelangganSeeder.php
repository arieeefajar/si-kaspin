<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggan::create([
            'kode_pelanggan' => 'PLG-0001',
            'nama_pelanggan' => 'Sekar Ayu',
            'alamat' => 'Jl. Raya Ciledug',
            'no_hp' => '081234567890',
        ]);
    }
}
