<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BreederController extends Controller
{
    public function index()
    {
        $breeders = User::where('role', 'breeder')->withCount('varietyReports')->get();
        return view('backend.pages.breeders', compact('breeders'));
    }

    public function create()
    {
        return view('backend.pages.breeder-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'breeder',
            'status' => $request->status,
        ]);

        return redirect()->route('breeders.index')->with('success', 'Breeder created successfully.');
    }

    public function edit($id)
    {
        $breeder = User::findOrFail($id);
        return view('backend.pages.breeder-edit', compact('breeder'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'status' => 'required|string',
        ]);

        $breeder = User::findOrFail($id);
        $breeder->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
        ]);

        return redirect()->route('breeders.index')->with('success', 'Breeder updated successfully.');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $breeder = User::findOrFail($id);
        $breeder->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('breeders.edit', $id)->with('success', 'Password updated successfully.');
    }

    public function destroy($id)
    {
        $breeder = User::findOrFail($id);
        $breeder->delete();

        return redirect()->route('breeders.index')->with('success', 'Breeder deleted successfully.');
    }
}
