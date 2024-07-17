<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VarietyReport;
use App\Models\VarietySample;

class VarietyReportAndSampleSeeder extends Seeder
{
    public function run()
    {
        // Seed Variety Reports
        for ($i = 1; $i <= 20; $i++) {
            $varietyReport = VarietyReport::create([
                'user_id' => 2, // Assuming user_id 2 exists
                'name' => 'Variety Report ' . $i,
                'slug' => 'variety-report-' . $i,
                'thumbnail' => 'uploads/variety_reports/1.png',
                'variety' => 'Variety ' . $i,
                'breeder_id' => rand(19, 23),
                'grower_id' => rand(14, 18),
                'amount_of_plants' => rand(10, 100),
                'amount_of_samples' => rand(1, 10),
                'next_sample_date' => now()->addDays(rand(1, 30)),
                'pot_size' => rand(5, 20) . ' cm',
                'pot_trial' => rand(0, 1),
                'trial_location' => 'Location ' . $i,
                'open_field_trial' => rand(0, 1),
                'date_of_propagation' => now()->subDays(rand(30, 100)),
                'date_of_potting' => now()->subDays(rand(10, 30)),
                'cut_back' => rand(0, 1),
                'removed_flowers' => rand(0, 50),
                'caned' => rand(0, 1),
                'status' => true,
            ]);

            // Seed Variety Samples for each Variety Report
            for ($j = 1; $j <= 2; $j++) { // Assuming each report has 2 samples
                VarietySample::create([
                    'images' => [
                        'uploads/variety_samples/1.png',
                        'uploads/variety_samples/2.png'
                    ],
                    'variety_report_id' => $varietyReport->id,
                    'date' => now()->subDays(rand(1, 30)),
                    'leaf_color' => 'Color ' . rand(1, 5),
                    'amount_of_branches' => rand(1, 10),
                    'flower_buds' => rand(1, 10),
                    'branch_color' => 'Color ' . rand(1, 5),
                    'roots' => 'Roots ' . rand(1, 5),
                    'flower_color' => 'Color ' . rand(1, 5),
                    'flower_petals' => rand(1, 10),
                    'flowering_time' => rand(1, 10) . ' days',
                    'length_of_flowering' => rand(1, 10) . ' cm',
                    'seeds' => rand(1, 10),
                    'seed_color' => 'Color ' . rand(1, 5),
                    'amount_of_seeds' => rand(1, 10),
                    'status' => true,
                ]);
            }
        }
    }
}
