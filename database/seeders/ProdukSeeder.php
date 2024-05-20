<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::create([
            'kode_produk' => 'PRD-0001',
            'kode_kategori' => 'KTGR-0001',
            'nama_produk' => 'Batako',
            'gambar' => '',
            'stock' => 100
        ],);

        Produk::create([
            'kode_produk' => 'PRD-0002',
            'kode_kategori' => 'KTGR-0001',
            'nama_produk' => 'Bata Merah',
            'gambar' => '',
            'stock' => 100
        ],);
    }
}
