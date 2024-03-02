<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Karyawan::create([
            'user_id' => 3
        ]);
        Karyawan::create([
            'user_id' => 4
        ]);
        Karyawan::create([
            'user_id' => 5
        ]);
        Karyawan::create([
            'user_id' => 6
        ]);
    }
}
