<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VarietyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
                $query->orderBy(User::select('name')->whereColumn('users.id', 'variety_reports.grower_id'), 'asc');
            } elseif ($sort == 'first-item-last') {
                $query->orderBy('id', 'asc');
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $varietyReports = $query->paginate(10);

        return view('frontend.pages.variety_reports', compact('varietyReports', 'growers'));
    }

    public function show($id)
    {
        $varietyReport = VarietyReport::with(['grower', 'breeder', 'samples'])->findOrFail($id);
        return view('frontend.pages.variety_report', compact('varietyReport'));
    }

    public function edit($id)
    {
        $varietyReport = VarietyReport::findOrFail($id);
        $growers = User::where('role', 'grower')->get();
        $breeders = User::where('role', 'breeder')->get();

        return view('frontend.pages.variety_report-edit', compact('varietyReport', 'growers', 'breeders'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'thumbnail' => 'nullable|mimes:jpeg,png,jpg|max:1024',
            'name' => 'required|string|max:255',
            'variety' => 'required|string|max:255',
            'breeder_id' => 'required|exists:users,id',
            'grower_id' => 'required|exists:users,id',
            'amount_of_plants' => 'required|integer|min:1',
            'amount_of_samples' => 'required|integer|min:1',
            'next_sample_date' => 'nullable|date',
            'pot_size' => 'nullable|string|max:255',
            'pot_trial' => 'required|boolean',
            'trial_location' => 'nullable|string|max:255',
            'open_field_trial' => 'required|boolean',
            'date_of_propagation' => 'nullable|date',
            'date_of_potting' => 'nullable|date',
            'cut_back' => 'required|boolean',
            'removed_flowers' => 'nullable|integer|min:0',
            'caned' => 'required|boolean',
            'status' => 'required|boolean',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $varietyReport = VarietyReport::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $filename = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $path = 'uploads/variety_reports/' . $filename;

            $image->move(public_path('uploads/variety_reports'), $filename);
            $data['thumbnail'] = $path;
        }

        $varietyReport->update($data);

        return redirect()->route('frontend.variety-reports.show', $varietyReport->id)
            ->with('success', 'Variety Report updated successfully');
    }

    // destroy method
    public function destroy($id)
    {
        $varietyReport = VarietyReport::findOrFail($id);
        $varietyReport->delete();

        return redirect()->route('variety-reports.index')
            ->with('success', 'Variety Report deleted successfully');
    }
}
