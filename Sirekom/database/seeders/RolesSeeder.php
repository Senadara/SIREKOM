<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
                Permission::create(['name' => 'ViewTask', 'guard_name' => 'mahasiswa']);
                Role::create(['name' => 'admin', 'guard_name' => 'admin', 'role_name' => 'admin']);
                Role::create(['name' => 'mahasiswa', 'guard_name' => 'mahasiswa', 'role_name' => 'mahasiswa']);
                Role::create(['name' => 'peserta', 'guard_name' => 'peserta', 'role_name' => 'peserta']);
        }
}
