<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Grower;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminGrowerController extends Controller
{
    public function index()
    {
        $growers = Grower::with('user')->get();
        return view('backend.pages.growers.index', compact('growers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required|string',
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|string|email|max:255|unique:growers',
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
            'role' => 'grower',
            'status' => $request->status,
        ]);

        Grower::create([
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

        return redirect()->route('growers.index')->with('success', 'Grower created successfully.');
    }

    public function create()
    {
        return view('backend.pages.growers.create');
    }

    public function edit($id)
    {
        $grower = Grower::findOrFail($id);
        return view('backend.pages.growers.edit', compact('grower'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $grower = Grower::findOrFail($id);
        $grower->user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('growers.edit', $id)->with('success', 'Password updated successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'status' => 'required|string',
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|string|email|max:255|unique:growers,company_email,' . $id,
            'contact_person' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'website' => 'required|string|max:255',
        ]);

        $grower = Grower::findOrFail($id);
        $user = $grower->user;

        $user->update([
            'email' => $request->email,
            'status' => $request->status,
        ]);

        $grower->update([
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

        return redirect()->route('growers.index')->with('success', 'Grower updated successfully.');
    }

    public function destroy($id)
    {
        $grower = Grower::findOrFail($id);
        $user = $grower->user;

        $grower->delete();
        $user->delete();

        return redirect()->route('growers.index')->with('success', 'Grower deleted successfully.');
    }
}
