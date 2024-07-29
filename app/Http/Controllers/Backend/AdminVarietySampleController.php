<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VarietySample;
use Illuminate\Http\Request;

class AdminVarietySampleController extends Controller
{
    public function create($variety_report_id)
    {
        return view('backend.pages.variety-samples.create', compact('variety_report_id'));
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

    public function store(Request $request, $variety_report_id)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'sample_date' => 'required|date',
            'leaf_color' => 'required|string|max:255',
            'amount_of_branches' => 'required|integer',
            'flower_buds' => 'required|integer',
            'branch_color' => 'required|string|max:255',
            'roots' => 'required|string|max:255',
            'flower_color' => 'required|string|max:255',
            'flower_petals' => 'required|integer',
            'flowering_time' => 'required|string|max:255',
            'length_of_flowering' => 'required|string|max:255',
            'seeds' => 'required|integer',
            'seed_color' => 'required|string|max:255',
            'amount_of_seeds' => 'required|integer',
        ]);

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->move(public_path('uploads/variety_samples'), $filename);
                $images[] = 'uploads/variety_samples/' . $filename;
            }
        }

        $varietySample = new VarietySample();
        $varietySample->variety_report_id = $variety_report_id;
        $varietySample->images = json_encode($images);
        $varietySample->sample_date = $request->sample_date;
        $varietySample->leaf_color = $request->leaf_color;
        $varietySample->amount_of_branches = $request->amount_of_branches;
        $varietySample->flower_buds = $request->flower_buds;
        $varietySample->branch_color = $request->branch_color;
        $varietySample->roots = $request->roots;
        $varietySample->flower_color = $request->flower_color;
        $varietySample->flower_petals = $request->flower_petals;
        $varietySample->flowering_time = $request->flowering_time;
        $varietySample->length_of_flowering = $request->length_of_flowering;
        $varietySample->seeds = $request->seeds;
        $varietySample->seed_color = $request->seed_color;
        $varietySample->amount_of_seeds = $request->amount_of_seeds;
        $varietySample->save();

        return redirect()->route('variety-samples.show', ['id' => $varietySample->id])
            ->with('success', 'Variety Sample created successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sample_date' => 'required|date',
            'leaf_color' => 'required|string|max:255',
            'amount_of_branches' => 'required|integer',
            'flower_buds' => 'required|integer',
            'branch_color' => 'required|string|max:255',
            'roots' => 'required|string|max:255',
            'flower_color' => 'required|string|max:255',
            'flower_petals' => 'required|integer',
            'flowering_time' => 'required|string|max:255',
            'length_of_flowering' => 'required|string|max:255',
            'seeds' => 'required|integer',
            'seed_color' => 'required|string|max:255',
            'amount_of_seeds' => 'required|integer',
        ]);

        $varietySample = VarietySample::findOrFail($id);
        $images = json_decode($varietySample->images, true) ?: [];

        // Handle deleted images
        if ($request->has('delete_images')) {
            if (count($images) == 1 && count($request->input('delete_images')) == 1) {
                return redirect()->back()->withErrors(['images' => 'You must have at least one image.']);
            } else {
                foreach ($request->input('delete_images') as $deleteImage) {
                    if (($key = array_search($deleteImage, $images)) !== false) {
                        unset($images[$key]);
                        if (file_exists(public_path($deleteImage))) {
                            unlink(public_path($deleteImage));
                        }
                    }
                }
            }
        }

        // Handle new image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->move(public_path('uploads/variety_samples'), $filename);
                $images[] = 'uploads/variety_samples/' . $filename;
            }
        }

        // Update images in the model
        $varietySample->images = json_encode(array_values($images));

        // Update other fields
        $varietySample->sample_date = $request->sample_date;
        $varietySample->leaf_color = $request->leaf_color;
        $varietySample->amount_of_branches = $request->amount_of_branches;
        $varietySample->flower_buds = $request->flower_buds;
        $varietySample->branch_color = $request->branch_color;
        $varietySample->roots = $request->roots;
        $varietySample->flower_color = $request->flower_color;
        $varietySample->flower_petals = $request->flower_petals;
        $varietySample->flowering_time = $request->flowering_time;
        $varietySample->length_of_flowering = $request->length_of_flowering;
        $varietySample->seeds = $request->seeds;
        $varietySample->seed_color = $request->seed_color;
        $varietySample->amount_of_seeds = $request->amount_of_seeds;
        $varietySample->save();

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
