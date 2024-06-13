<?php

namespace Database\Seeders;

use App\Models\Peserta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peserta = Peserta::create([
            'idLomba' => '1',
            'idMahasiswa' => '7',
            'tanggalDaftar' => '2024-06-04',
        ]);
        $peserta = Peserta::create([
            'idLomba' => '1',
            'idMahasiswa' => '1',
            'tanggalDaftar' => '2024-06-04',
        ]);
        $peserta = Peserta::create([
            'idLomba' => '2',
            'idMahasiswa' => '2',
            'tanggalDaftar' => '2024-06-04',
        ]);
        $peserta = Peserta::create([
            'idLomba' => '3',
            'idMahasiswa' => '3',
            'tanggalDaftar' => '2024-06-04',
        ]);
        $peserta->assignRole('peserta');
    }
}
