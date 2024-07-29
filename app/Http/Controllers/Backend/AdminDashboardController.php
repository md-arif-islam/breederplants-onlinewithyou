<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Grower;
use App\Models\Breeder;
use App\Models\VarietyReport;
use App\Models\VarietySample;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalGrowers = Grower::count();
        $totalBreeders = Breeder::count();
        $totalVarietyReports = VarietyReport::count();
        $totalVarietySamples = VarietySample::count();

        return view('backend.pages.dashboard', compact('totalGrowers', 'totalBreeders', 'totalVarietyReports', 'totalVarietySamples'));
    }
}
