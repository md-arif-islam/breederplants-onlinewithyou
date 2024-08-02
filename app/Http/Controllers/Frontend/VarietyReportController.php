<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VarietyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VarietyReportController extends Controller
{
    public function index(Request $request)
    {
        $query = VarietyReport::with(['grower', 'breeder']);

        // Search functionality
        if ($search = $request->input('search')) {
            $query->where('variety_name', 'LIKE', "%{$search}%");
        }

        // Sorting functionality
        if ($sort = $request->input('sort')) {
            switch ($sort) {
                case 'a-z':
                    $query->orderBy('variety_name', 'asc');
                    break;
                case 'last-item-first':
                    $query->latest();
                    break;
                case 'first-item-last':
                    $query->oldest();
                    break;
            }
        }

        // Grower filter functionality
        if ($growerId = $request->input('grower_id')) {
            $query->where('grower_id', $growerId);
        }

        if (Auth::user()->role == 'admin'){
            $varietyReports = $query->where('status', '1')->paginate(10);
        }else{
            $varietyReports = $query->where('status', '1')->where('grower_id', Auth::id())->paginate(10);

        }
        $growers = User::where('role', 'grower')->with('grower')->get();

        return view('frontend.pages.variety-reports.index', compact('varietyReports', 'growers'));
    }

    public function create()
    {
        $growers = User::where('role', 'grower')->get();
        $breeders = User::where('role', 'breeder')->get();
        return view('backend.pages.variety-reports.create', compact('growers', 'breeders'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'variety_name' => 'required|string|max:255|unique:variety_reports',
            'breeder_id' => 'required|exists:users,id',
            'grower_id' => 'required|exists:users,id',
            'amount_of_plants' => 'required|integer|min:1',
            'pot_size' => 'nullable|string|max:255',
            'pot_trial' => 'required|boolean',
            'open_field_trial' => 'required|boolean',
            'date_of_propagation' => 'nullable|date',
            'date_of_potting' => 'nullable|date',
            'samples_schedule' => 'required|array',
            'samples_schedule.*' => 'required|date',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $varietyReport = new VarietyReport();

        $varietyReport->user_id = Auth::id();
        $varietyReport->grower_id = $request->grower_id;
        $varietyReport->breeder_id = $request->breeder_id;
        $varietyReport->variety_name = $request->variety_name;
        $varietyReport->amount_of_plants = $request->amount_of_plants;
        $varietyReport->pot_size = $request->pot_size;
        $varietyReport->pot_trial = $request->pot_trial;
        $varietyReport->open_field_trial = $request->open_field_trial;
        $varietyReport->date_of_propagation = $request->date_of_propagation;
        $varietyReport->date_of_potting = $request->date_of_potting;
        $varietyReport->samples_schedule = json_encode($request->samples_schedule);
        $varietyReport->status = $request->status;

        $varietyReport->save();

        return redirect()->route('variety-reports.index')->with('success', 'Variety Report created successfully.');
    }

    public function show($id)
    {
        $varietyReport = VarietyReport::with(['grower', 'breeder', 'samples'])->findOrFail($id);
        return view('frontend.pages.variety-reports.show', compact('varietyReport'));
    }

    public function edit($id)
    {
        $varietyReport = VarietyReport::findOrFail($id);
        $growers = User::where('role', 'grower')->with('grower')->get();
        $breeders = User::where('role', 'breeder')->with('breeder')->get();

        return view('frontend.pages.variety-reports.edit', compact('varietyReport', 'growers', 'breeders'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'variety_name' => 'required|string|max:255|unique:variety_reports,variety_name,' . $id,
            'breeder_id' => 'required|exists:users,id',
            'grower_id' => 'required|exists:users,id',
            'amount_of_plants' => 'required|integer|min:1',
            'pot_size' => 'nullable|string|max:255',
            'pot_trial' => 'required|boolean',
            'open_field_trial' => 'required|boolean',
            'date_of_propagation' => 'nullable|date',
            'date_of_potting' => 'nullable|date',
            'samples_schedule' => 'required|array',
            'samples_schedule.*' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $varietyReport = VarietyReport::findOrFail($id);

        $varietyReport->grower_id = $request->grower_id;
        $varietyReport->breeder_id = $request->breeder_id;
        $varietyReport->variety_name = $request->variety_name;
        $varietyReport->amount_of_plants = $request->amount_of_plants;
        $varietyReport->pot_size = $request->pot_size;
        $varietyReport->pot_trial = $request->pot_trial;
        $varietyReport->open_field_trial = $request->open_field_trial;
        $varietyReport->date_of_propagation = $request->date_of_propagation;
        $varietyReport->date_of_potting = $request->date_of_potting;
        $varietyReport->samples_schedule = json_encode($request->samples_schedule);
        $varietyReport->status = '1';

        $varietyReport->save();

        return redirect()->route('frontend.variety-reports.show', $varietyReport->id)
            ->with('success', 'Variety Report updated successfully');
    }

    public function destroy($id)
    {
        $varietyReport = VarietyReport::findOrFail($id);
        $varietyReport->delete();

        return redirect()->route('variety-reports.index')
            ->with('success', 'Variety Report deleted successfully');
    }
}
