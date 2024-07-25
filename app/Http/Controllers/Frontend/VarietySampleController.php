<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\VarietySample;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VarietySampleController extends Controller
{

    public function create()
    {
        return view('frontend.pages.variety_sample-create');
    }


    public function show($id)
    {
        $sample = VarietySample::findOrFail($id);
        return view('frontend.pages.vareity_sample', compact('sample'));
    }

    public function edit($id)
    {
        $varietySample = VarietySample::findOrFail($id);
        return view('frontend.pages.variety_sample-edit', compact('varietySample'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required|date',
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
        $images = $varietySample->images;

        // Handle image deletion
        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $image) {
                if (($key = array_search($image, $images)) !== false) {
                    unset($images[$key]);
                    // Optionally delete the image file from storage
                    if (file_exists(public_path($image))) {
                        unlink(public_path($image));
                    }
                }
            }
        }

        // Handle new image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . time() . '.' . $image->getClientOriginalExtension();
                $path = $image->move(public_path('uploads/variety_samples'), $filename);
                $images[] = 'uploads/variety_samples/' . $filename;
            }
        }

        // Update images in the model
        $varietySample->images = array_values($images);

        // Update other fields
        $varietySample->update([
            'date' => $request->date,
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

        return redirect()->route('frontend.variety-samples.show', ['id' => $varietySample->id])
            ->with('success', 'Variety Sample updated successfully');
    }

    // destroy method

    public function destroy($id)
    {
        // i want after delete go to vareity report show page
        $varietySample = VarietySample::findOrFail($id);
        $varietyReportId = $varietySample->variety_report_id;
        $varietySample->delete();

        return redirect()->route('variety-reports.show', ['id' => $varietyReportId])
            ->with('success', 'Variety Sample deleted successfully');
    }

}
