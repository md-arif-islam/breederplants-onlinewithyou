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
                    'user_id' => $i + 6,
                    'name' => fake()->unique()->name,
                    'company_name' => fake()->company,
                    'company_email' => fake()->unique()->companyEmail,
                    'contact_person' => fake()->name,
                    'street' => fake()->streetAddress,
                    'city' => fake()->city,
                    'postal_code' => fake()->postcode,
                    'country' => fake()->country,
                    'phone' => fake()->phoneNumber,
                    'website' => 'https://breederplants.nl/',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }
}
