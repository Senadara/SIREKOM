<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswa = Mahasiswa::create([
            'username' => 'LoverBoy',
            'password' => Hash::make('flashpoint'),
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
