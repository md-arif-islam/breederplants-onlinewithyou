<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VarietyReport;
use App\Models\VarietySample;

class VarietyReportAndSampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed Variety Reports
        for ($i = 1; $i <= 10; $i++) {
            $varietyReport = VarietyReport::create([
                'user_id' => 2,
                'name' => 'Variety Report ' . $i,
                'slug' => 'variety-report-' . $i,
                'thumbnail' => 'thumbnail' . $i . '.jpg',
                'variety' => 'Variety ' . $i,
                'breeder_name' => 'Breeder ' . $i,
                'grower_name' => 'Grower ' . $i,
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
            ]);

            // Seed Variety Samples for each Variety Report
            for ($j = 1; $j <= 3; $j++) { // Assuming each report has 3 samples
                VarietySample::create([
                    'images' => json_encode(['image' . $i . '_' . $j . '_1.jpg', 'image' . $i . '_' . $j . '_2.jpg']),
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
                ]);
            }
        }
    }
}
