<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswa = Mahasiswa::create([
            'username' => 'LoverBoy',
            'password' => 'flashpoint',
            'namaMahasiswa' => 'Dito Aditya Nugroho',
            'email' => 'dito@gmail.com',
            'nim' => '1201220007',
            'jurusan' => 'RPL',
            'angkatan' => '2022',
            'noHP' => '08817028161',
            'fotoProfile' => 'assets/img/profile/default.jpg',
        ]);
        $mahasiswa->assignRole('mahasiswa');
    }
}
