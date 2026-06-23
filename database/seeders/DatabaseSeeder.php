<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::updateOrCreate(['username' => 'test'], [
            'name' => 'Admin SanitaCheck',
            'email' => 'admin@sanitacheck.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        // Petugas
        User::updateOrCreate(['username' => 'petugas1'], [
            'name' => 'Petugas Kebersihan',
            'email' => 'petugas1@sanitacheck.com',
            'password' => bcrypt('petugas123'),
            'role' => 'petugas',
        ]);
    }
}
