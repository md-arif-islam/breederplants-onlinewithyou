<?php


namespace App\Http\Controllers;

use App\Models\VarietyReport;
use App\Models\User;
use Illuminate\Http\Request;

class VarietyReportController extends Controller
{
    public function index(Request $request)
    {
        $query = VarietyReport::with('grower', 'breeder');

        // Get distinct grower names for the filter dropdown
        $growers = User::where('role', 'grower')->get();

        // Search functionality
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%')
                ->orWhereHas('grower', function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->input('search') . '%');
                });
        }

        if ($request->has('grower_id') && $request->input('grower_id') != '') {
            $varietyReportsByGrower = VarietyReport::where('grower_id', $request->input('grower_id'))->paginate(5);
            return view('backend.pages.variety_reports', ['varietyReports' => $varietyReportsByGrower, 'growers' => $growers]);
        }

        // Sorting functionality
        if ($request->has('sort')) {
            $sort = $request->input('sort');
            if ($sort == 'a-z') {
                $query->orderBy('name', 'asc');
                $query->orderBy('id', 'desc');
            } elseif ($sort == 'first-item-last') {
                $query->orderBy('id', 'asc');
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $varietyReports = $query->paginate(5);



        return view('backend.pages.variety_reports', compact('varietyReports', 'growers'));
    }

    public function show($id)
    {
        $varietyReport = VarietyReport::with(['grower', 'breeder', 'samples'])->findOrFail($id);
        return view('backend.pages.variety_report', compact('varietyReport'));
    }

}

