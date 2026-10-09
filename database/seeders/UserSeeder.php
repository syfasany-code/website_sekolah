<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
       User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'email' => 'admin@gmail.com',
            'role' => 'admin',
        ]);

        User::create([
            'name'=> 'Operator',
            'username'=> 'operator',
            'password'=> Hash::make('operator123'),
            'email' => 'operator@gmail.com',
            'role'=> 'operator',
        ]);

    }
}
