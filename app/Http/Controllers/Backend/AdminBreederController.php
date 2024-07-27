<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Breeder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminBreederController extends Controller
{
    public function index()
    {
        $breeders = Breeder::with('user')->get();
        return view('backend.pages.breeders.index', compact('breeders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required|string',
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|string|email|max:255|unique:breeders',
            'contact_person' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'website' => 'required|string|max:255',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'breeder',
            'status' => $request->status,
        ]);

        Breeder::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'contact_person' => $request->contact_person,
            'street' => $request->street,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'phone' => $request->phone,
            'website' => $request->website,
        ]);

        return redirect()->route('breeders.index')->with('success', 'Breeder created successfully.');
    }

    public function create()
    {
        return view('backend.pages.breeders.create');
    }

    public function edit($id)
    {
        $breeder = Breeder::findOrFail($id);
        return view('backend.pages.breeders.edit', compact('breeder'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $breeder = Breeder::findOrFail($id);
        $breeder->user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('breeders.edit', $id)->with('success', 'Password updated successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'status' => 'required|string',
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|string|email|max:255|unique:breeders,company_email,' . $id,
            'contact_person' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'website' => 'required|string|max:255',
        ]);

        $breeder = Breeder::findOrFail($id);
        $user = $breeder->user;

        $user->update([
            'email' => $request->email,
            'status' => $request->status,
        ]);

        $breeder->update([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'contact_person' => $request->contact_person,
            'street' => $request->street,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'phone' => $request->phone,
            'website' => $request->website,
        ]);

        return redirect()->route('breeders.index')->with('success', 'Breeder updated successfully.');
    }

    public function destroy($id)
    {
        $breeder = Breeder::findOrFail($id);
        $user = $breeder->user;

        $breeder->delete();
        $user->delete();

        return redirect()->route('breeders.index')->with('success', 'Breeder deleted successfully.');
    }
}
