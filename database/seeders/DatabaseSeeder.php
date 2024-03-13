<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User
        $this->call(UserSeeder::class);

        // Karyawan
        $this->call(KaryawanSeeder::class);

        // Pelanggan
        $this->call(PelangganSeeder::class);

        // Barang
        $this->call(BarangSeeder::class);

        // Kiloan
        $this->call(KiloanSeeder::class);

        // Jenis Layanan
        $this->call(JenisLayananSeeder::class);

        // Nota
        $this->call(NotaSeeder::class);
    }
}
