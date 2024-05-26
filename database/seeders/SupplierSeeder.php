<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            'kode_supplier' => 'SPL-0001',
            'nama' => 'Supplier 1',
            'no_hp' => '081234567890',
        ]);
    }
}
