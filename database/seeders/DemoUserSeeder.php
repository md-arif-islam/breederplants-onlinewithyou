<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DemoUserSeeder extends Seeder
{
    public function run()
    {
        // Seed Growers
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => 'Grower ' . $i,
                'email' => 'grower' . $i . '@example.com',
                'password' => Hash::make('password'), // Use a secure password in production
                'role' => 'grower',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed Breeders
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => 'Breeder ' . $i,
                'email' => 'breeder' . $i . '@example.com',
                'password' => Hash::make('password'), // Use a secure password in production
                'role' => 'breeder',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
