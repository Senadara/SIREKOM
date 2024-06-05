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
            'idMahasiswa' => '11',
            'tanggalDaftar' => '2024-06-04',
        ]);
        $peserta->assignRole('peserta');
    }
}
