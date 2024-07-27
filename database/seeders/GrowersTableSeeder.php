<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrowersTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('growers')->insert([
                [
                    'user_id' => $i + 1, // Adjusting user_id to match growers' user IDs
                    'name' => 'Grower Name ' . $i,
                    'company_name' => 'Grower Company ' . $i,
                    'company_email' => 'grower'.$i.'@example.com',
                    'contact_person' => 'Grower Contact ' . $i,
                    'street' => '123 Grower Lane ' . $i,
                    'city' => 'Growerville',
                    'postal_code' => '12345',
                    'country' => 'Country ' . $i,
                    'phone' => '123-456-789' . $i,
                    'website' => 'http://grower' . $i . '.com',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }
}
