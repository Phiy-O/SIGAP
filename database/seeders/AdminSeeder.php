<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Cek apakah admin sudah ada
        $adminExists = User::where('email', 'admin@sigap.id')->exists();

        if (!$adminExists) {
            User::create([
                'name' => 'Super Admin',
                'email' => 'admin@sigap.id',
                'password' => Hash::make('admin123'),
                'phone' => '081234567890',
                'role' => 'user', // Bisa diubah ke 'admin' jika perlu role khusus
                'email_verified_at' => now(),
            ]);

            $this->command->info('Super Admin berhasil dibuat!');
            $this->command->info('Email: admin@sigap.id');
            $this->command->info('Password: admin123');
        } else {
            $this->command->info('Super Admin sudah ada!');
        }
    }
}

