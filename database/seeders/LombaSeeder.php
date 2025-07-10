<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Lomba;
use Illuminate\Database\Seeder;

class LombaSeeder extends Seeder
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
    }
}
