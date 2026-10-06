<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun untuk login: admin@example.com / password
        User::create([
            'name' => 'Admin Perpustakaan',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        $this->call([
            CategorySeeder::class,
            BookSeeder::class,
        ]);
    }
}
