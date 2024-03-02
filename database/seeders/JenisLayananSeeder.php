<?php

namespace Database\Seeders;

use App\Models\JenisLayanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisLayanan::create([
            'jenis_cuci' => 'Reguler',
            'waktu' => '180 Menit',
            'harga' => 0
        ]);
        JenisLayanan::create([
            'jenis_cuci' => 'Cepat',
            'waktu' => '60 Menit',
            'harga' => 15000
        ]);
        JenisLayanan::create([
            'jenis_cuci' => 'Kilat',
            'waktu' => '30 Menit',
            'harga' => 30000
        ]);
        JenisLayanan::create([
            'jenis_cuci' => 'Super Duper',
            'waktu' => '10 Menit',
            'harga' => 50000
        ]);
    }
}
