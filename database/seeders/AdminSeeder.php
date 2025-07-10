<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::create([
            'username' => 'agung',
            'password' => Hash::make('gemes'), // password
        ]);
        $admin = Admin::create([
            'username' => 'andry',
            'password' => Hash::make('gemes'),
        ]);

        $admin->assignRole('admin');
    }
}
