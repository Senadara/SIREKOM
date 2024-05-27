<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Lomba;
use App\Models\Mahasiswa;
use App\Models\Peserta;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::create([
            'username' => 'admin',
            'password' => 'admin',
        ]);
        Lomba::factory(6)->create();
        Mahasiswa::factory(10)->create();
        Peserta::create([
            'idLomba' => 1,
            'idMahasiswa' => 1,
            'tanggalDaftar' => '2024-05-18',
        ]);
        Peserta::create([
            'idLomba' => 2,
            'idMahasiswa' => 2,
            'tanggalDaftar' => '2024-05-19',
        ]);
        Peserta::create([
            'idLomba' => 3,
            'idMahasiswa' => 3,
            'tanggalDaftar' => '2024-05-20',
        ]);

        Peserta::create([
            'idLomba' => 4,
            'idMahasiswa' => 4,
            'tanggalDaftar' => '2024-05-21',
        ]);

        Peserta::create([
            'idLomba' => 5,
            'idMahasiswa' => 5,
            'tanggalDaftar' => '2024-05-22',
        ]);

        Peserta::create([
            'idLomba' => 6,
            'idMahasiswa' => 6,
            'tanggalDaftar' => '2024-05-23',
        ]);

        $this->call(TaskSeeder::class);
        
    }
}
