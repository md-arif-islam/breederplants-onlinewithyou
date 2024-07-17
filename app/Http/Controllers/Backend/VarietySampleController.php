<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VarietySample;

class VarietySampleController extends Controller
{
    /**
     * Display the specified sample.
     */
    public function show($id)
    {
        $sample = VarietySample::findOrFail($id);
        return view('backend.pages.variety_sample', compact('sample'));
    }

//    /**
//     * Show the form for editing the specified sample.
//     */
//    public function edit($id)
//    {
//        $sample = VarietySample::findOrFail($id);
//        return view('backend.pages.edit_sample', compact('sample'));
//    }
//
//    /**
//     * Update the specified sample in storage.
//     */
//    public function update(Request $request, $id)
//    {
//        $request->validate([
//            'date' => 'required|date',
//            // Add other validation rules as needed
//        ]);
//
//        $sample = VarietySample::findOrFail($id);
//        $sample->update($request->all());
//
//        return redirect()->route('variety-samples.show', $sample->id)
//            ->with('success', 'Sample updated successfully');
//    }
//
//    /**
//     * Remove the specified sample from storage.
//     */
//    public function destroy($id)
//    {
//        $sample = VarietySample::findOrFail($id);
//        $sample->delete();
//
//        return redirect()->route('variety-reports.show', $sample->variety_report_id)
//            ->with('success', 'Sample deleted successfully');
//    }
}
