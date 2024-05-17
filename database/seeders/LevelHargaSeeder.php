<?php

namespace Database\Seeders;

use App\Models\LevelHarga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelHargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LevelHarga::create(
            [
                'kode_level' => 'LVH-0001',
                'kode_produk' => 'PRD-0001',
                'nama_level' => 'Ecer',
                'harga_satuan' => 2000
            ]
        );
    }
}
