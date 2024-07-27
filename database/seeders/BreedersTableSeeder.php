<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BreedersTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('breeders')->insert([
                [
                    'user_id' => $i + 6, // Adjusting user_id to match breeders' user IDs
                    'name' => 'Breeder Name ' . $i,
                    'company_name' => 'Breeder Company ' . $i,
                    'company_email' => 'breeder'.$i.'@example.com',
                    'contact_person' => 'Breeder Contact ' . $i,
                    'street' => '123 Breeder Lane ' . $i,
                    'city' => 'Breederville',
                    'postal_code' => '54321',
                    'country' => 'Country ' . $i,
                    'phone' => '987-654-321' . $i,
                    'website' => 'http://breeder' . $i . '.com',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }
}
