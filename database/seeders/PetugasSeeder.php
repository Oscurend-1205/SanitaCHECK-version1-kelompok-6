<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    /**
     * Seed akun petugas: "Yanto 24 Jam" siap login!
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'petugas'],
            [
                'name' => 'Petugas Sanitasi',
                'email' => 'petugas@sanitacheck.id',
                'password' => Hash::make('petugas123'),
                'role' => 'petugas',
            ]
        );
    }
}
