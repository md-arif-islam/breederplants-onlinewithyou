<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VarietySample;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminVarietySampleController extends Controller
{
    public function create()
    {
        return view('backend.pages.variety-samples.create');
    }

    public function show($id)
    {
        $sample = VarietySample::findOrFail($id);
        return view('backend.pages.variety-samples.index', compact('sample'));
    }

    public function edit($id)
    {
        $varietySample = VarietySample::findOrFail($id);
        return view('backend.pages.variety-samples.edit', compact('varietySample'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sample_date' => 'required|date',
            'leaf_color' => 'nullable|string|max:255',
            'amount_of_branches' => 'nullable|integer',
            'flower_buds' => 'nullable|integer',
            'branch_color' => 'nullable|string|max:255',
            'roots' => 'nullable|string|max:255',
            'flower_color' => 'nullable|string|max:255',
            'flower_petals' => 'nullable|integer',
            'flowering_time' => 'nullable|string|max:255',
            'length_of_flowering' => 'nullable|string|max:255',
            'seeds' => 'nullable|integer',
            'seed_color' => 'nullable|string|max:255',
            'amount_of_seeds' => 'nullable|integer',
        ]);

        $varietySample = VarietySample::findOrFail($id);
        $images = json_decode($varietySample->images, true);



        // Handle new image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . time() . '.' . $image->getClientOriginalExtension();
                $path = $image->move(public_path('uploads/variety_samples'), $filename);
                $images[] = 'uploads/variety_samples/' . $filename;
            }
        }

        // Update images in the model
        $varietySample->images = json_encode(array_values($images));

        // Update other fields
        $varietySample->update([
            'sample_date' => $request->sample_date,
            'leaf_color' => $request->leaf_color,
            'amount_of_branches' => $request->amount_of_branches,
            'flower_buds' => $request->flower_buds,
            'branch_color' => $request->branch_color,
            'roots' => $request->roots,
            'flower_color' => $request->flower_color,
            'flower_petals' => $request->flower_petals,
            'flowering_time' => $request->flowering_time,
            'length_of_flowering' => $request->length_of_flowering,
            'seeds' => $request->seeds,
            'seed_color' => $request->seed_color,
            'amount_of_seeds' => $request->amount_of_seeds,
        ]);

        return redirect()->route('variety-samples.show', ['id' => $varietySample->id])
            ->with('success', 'Variety Sample updated successfully');
    }

    public function destroy($id)
    {
        $varietySample = VarietySample::findOrFail($id);
        $varietyReportId = $varietySample->variety_report_id;
        $varietySample->delete();

        return redirect()->route('variety-reports.show', ['id' => $varietyReportId])
            ->with('success', 'Variety Sample deleted successfully');
    }
}
