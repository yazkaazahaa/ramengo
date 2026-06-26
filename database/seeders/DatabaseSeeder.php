<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin', // sesuaikan nama kolom role di tabelmu
        ]);

        // 2. Akun Kitchen (Dapur)
        User::create([
            'name' => 'Tim Kitchen',
            'email' => 'kitchen@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'kitchen',
        ]);

        // 3. Akun Kasir
        User::create([
            'name' => 'Kasir Depan',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'kasir',
        ]);
    }
}
