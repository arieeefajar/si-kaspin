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
        [
            LevelHarga::create(
                [
                    'kode_level' => 'LVH-00001',
                    'kode_produk' => 'PRD-00001',
                    'nama_level' => 'Ecer',
                    'harga_satuan' => 2000
                ]
            ),

            LevelHarga::create(
                [
                    'kode_level' => 'LVH-00002',
                    'kode_produk' => 'PRD-00001',
                    'nama_level' => 'Grosir',
                    'harga_satuan' => 1500
                ]
            ),
        ];
    }
}
