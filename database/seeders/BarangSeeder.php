<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create([
            'name' => 'Selimut',
            'harga' => 15000
        ]);
        Barang::create([
            'name' => 'Rok',
            'harga' => 5000
        ]);
        Barang::create([
            'name' => 'Celana Jeans',
            'harga' => 8000
        ]);
        Barang::create([
            'name' => 'Kemeja',
            'harga' => 10000
        ]);
    }
}
