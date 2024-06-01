<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'email' => 'admin@mail.com',
            'name' => 'Administrator',
            'password' => bcrypt('admin123'),
            'role' => 'Admin',
            'last_login' => now(),
        ]);
    }
    
}
