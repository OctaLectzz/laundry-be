<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 'Admin',
            'jenis_kelamin' => 'Laki-Laki'
        ]);
        User::create([
            'name' => 'Octavyan Putra Ramadhan',
            'email' => 'octavyan4@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'Admin',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Larangan RT04/RW04 Gayam Sukoharjo'
        ]);

        // Karyawan
        User::create([
            'name' => 'Vavian Ega Ramadhan',
            'email' => 'vavian20039@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'Karyawan',
            'jenis_kelamin' => 'Laki-Laki'
        ]);
        User::create([
            'name' => 'Sidiq Kurniawan',
            'email' => 'sidiqchan@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'Karyawan',
            'jenis_kelamin' => 'Laki-Laki'
        ]);
        User::create([
            'name' => 'Fadly Rizky Maulana',
            'email' => 'fadlynub@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'Karyawan',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Ngaglik RT2/RW4 Bendosari, Sukoharjo'
        ]);
        User::create([
            'name' => 'Puan Maharani',
            'email' => 'puanrawr@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'Karyawan',
            'jenis_kelamin' => 'Perempuan'
        ]);

        // Pelanggan
        User::create([
            'name' => 'Galang Ardiansyah',
            'email' => 'galangpekok@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'Pelanggan',
            'jenis_kelamin' => 'Laki-Laki'
        ]);
        User::create([
            'name' => 'Megawati',
            'email' => 'megachan@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'Pelanggan',
            'jenis_kelamin' => 'Perempuan'
        ]);
    }
}
