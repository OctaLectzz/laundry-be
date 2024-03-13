<?php

namespace Database\Seeders;

use App\Models\Kiloan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KiloanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kiloan::create([
            'paket' => 'SUPER DUPER 5kg',
            'harga' => 50000
        ]);
        Kiloan::create([
            'paket' => '4 Jam Selesai',
            'harga' => 35000,
            'description' => 'CUCI KERING + SETRIKA + PACKING'
        ]);
        Kiloan::create([
            'paket' => '4 Jam Selesai',
            'harga' => 35000,
            'description' => 'CUCI KERING + SETRIKA + PACKING'
        ]);
        Kiloan::create([
            'paket' => '4 Jam Selesai',
            'harga' => 25000,
            'description' => 'CUCI KERING + PACKING'
        ]);
        Kiloan::create([
            'paket' => '8 Jam Selesai',
            'harga' => 30000,
            'description' => 'CUCI KERING + SETRIKA + PACKING'
        ]);
        Kiloan::create([
            'paket' => '24 Jam Selesai',
            'harga' => 20000,
            'description' => 'CUCI KERING + SETRIKA + PACKING'
        ]);
    }
}
