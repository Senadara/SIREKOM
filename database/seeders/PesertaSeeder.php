<?php

namespace Database\Seeders;

use App\Models\Peserta;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Peserta records
        $pesertas = [
            ['idLomba' => '1', 'idMahasiswa' => '7', 'tanggalDaftar' => '2024-06-04'],
            ['idLomba' => '1', 'idMahasiswa' => '1', 'tanggalDaftar' => '2024-06-04'],
            ['idLomba' => '2', 'idMahasiswa' => '2', 'tanggalDaftar' => '2024-06-04'],
            ['idLomba' => '3', 'idMahasiswa' => '3', 'tanggalDaftar' => '2024-06-04'],
        ];

        foreach ($pesertas as $data) {
            $peserta = Peserta::create($data);

            // Assign role to the associated User
            $user = Mahasiswa::find($data['idMahasiswa']);
            if ($user) {
                $user->assignRole('peserta'); // Ensure 'peserta' role exists for the 'mahasiswa' guard
            }
        }
    }
}
