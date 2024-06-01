<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'administrator',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
