<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Lomba;
use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat admin
        $admin = Admin::create([
            'username' => 'admin',
            'password' => 'admin', 
        ]);

        // Membuat 3 lomba
        $lombas = Lomba::factory(6)->create([
            'idAdmin' => $admin->id
        ]);

        // Membuat 3 task untuk setiap lomba
        foreach($lombas as $lomba){
            Task::factory(1)->create([
                'idLomba' => $lomba->id
        ]);
        }
        

    }
}
