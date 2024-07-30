<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Create 5 growers
        for ($i = 1; $i <= 5; $i++) {
            DB::table('users')->insert([
                [
                    'email' => fake()->unique()->safeEmail,
                    'password' => Hash::make('password'),
                    'role' => 'grower',
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            DB::table('users')->insert([
                [
                    'email' => fake()->unique()->safeEmail,
                    'password' => Hash::make('password'),
                    'role' => 'breeder',
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
