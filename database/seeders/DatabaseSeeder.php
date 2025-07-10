<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Task;
use App\Models\Admin;
use App\Models\Lomba;
use App\Models\Peserta;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\RolesSeeder;
use Database\Seeders\PesertaSeeder;
use Database\Seeders\MahasiswaSeeder;

class DatabaseSeeder extends Seeder
{
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
                // Peserta::create([
                //     'idLomba' => 1,
                //     'idMahasiswa' => 1,
                //     'tanggalDaftar' => '2024-05-18',
                // ]);
                // Peserta::create([
                //     'idLomba' => 2,
                //     'idMahasiswa' => 2,
                //     'tanggalDaftar' => '2024-05-19',
                // ]);
                // Peserta::create([
                //     'idLomba' => 3,
                //     'idMahasiswa' => 3,
                //     'tanggalDaftar' => '2024-05-20',
                // ]);

                //roles
                $this->call(RolesSeeder::class);
                $this->call(AdminSeeder::class);
                $this->call(MahasiswaSeeder::class);
                Mahasiswa::factory(10)->withRole()->create();
                Lomba::factory(3)->create();
                $this->call(PesertaSeeder::class);
        }
}
