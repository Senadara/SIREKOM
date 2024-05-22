<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Lomba;
use App\Models\Mahasiswa;
use App\Models\Peserta;
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
        Lomba::factory(3)->create();
        Mahasiswa::factory(10)->create();
    }
}
