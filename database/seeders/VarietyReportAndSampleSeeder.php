<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\VarietyReport;
use App\Models\VarietySample;

class VarietyReportAndSampleSeeder extends Seeder
{
    public function run()
    {
        // Seed Variety Reports
        for ($i = 1; $i <= 50; $i++) {
            $samplesSchedule = [
                Carbon::now()->addDays(rand(1, 10))->toDateString(),
                Carbon::now()->addDays(rand(11, 20))->toDateString(),
                Carbon::now()->addDays(rand(21, 30))->toDateString(),
            ];

            $varietyReport = VarietyReport::create([
                'user_id' => 1,
                'grower_id' => rand(2, 6),
                'breeder_id' =>  rand(7, 10),
                'variety_name' => 'Variety Name ' . $i,
                'amount_of_plants' => rand(10, 100),
                'pot_size' => rand(5, 20) . ' cm',
                'pot_trial' => rand(0, 1),
                'open_field_trial' => rand(0, 1),
                'date_of_propagation' => Carbon::now()->subDays(rand(30, 100)),
                'date_of_potting' => Carbon::now()->subDays(rand(10, 30)),
                'samples_schedule' => json_encode($samplesSchedule),
                'status' => true,
            ]);

            for ($j = 1; $j <= 2; $j++) {
                VarietySample::create([
                    'variety_report_id' => $varietyReport->id,
                    'images' => json_encode([
                        'uploads/variety_samples/1.png',
                        'uploads/variety_samples/2.png'
                    ]),
                    'sample_date' => Carbon::now()->subDays(rand(1, 30)),
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
