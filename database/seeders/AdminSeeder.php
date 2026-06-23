<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengecek apakah admin sudah ada berdasarkan email
        $adminEmail = 'admin@sanitacheck.id';
        
        if (!User::where('email', $adminEmail)->exists()) {
            User::create([
                'name' => 'Admin SanitaCheck',
                'username' => 'admin_sanita',
                'email' => $adminEmail,
                'password' => Hash::make('password123'), // Password default admin
                'role' => 'admin',
            ]);
            
            $this->command->info('Admin berhasil ditambahkan! Email: ' . $adminEmail . ' | Password: password123');
        } else {
            $this->command->info('Data admin sudah ada di database.');
        }
    }
}
