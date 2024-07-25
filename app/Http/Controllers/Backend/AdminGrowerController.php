<?php
// GrowerController.php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminGrowerController extends Controller
{
    public function index()
    {
        $growers = User::where('role', 'grower')->withCount('varietyReports')->get();
        return view('backend.pages.growers', compact('growers'));
    }

    public function create()
    {
        return view('backend.pages.grower-create');
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
            'role' => 'grower',
            'status' => $request->status,
        ]);

        return redirect()->route('growers.index')->with('success', 'Grower created successfully.');
    }

    public function edit($id)
    {
        $grower = User::findOrFail($id);
        return view('backend.pages.grower-edit', compact('grower'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'status' => 'required|string',
        ]);

        $grower = User::findOrFail($id);
        $grower->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
        ]);

        return redirect()->route('growers.index')->with('success', 'Grower updated successfully.');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $grower = User::findOrFail($id);
        $grower->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('growers.edit', $id)->with('success', 'Password updated successfully.');
    }

    public function destroy($id)
    {
        $grower = User::findOrFail($id);
        $grower->delete();

        return redirect()->route('growers.index')->with('success', 'Grower deleted successfully.');
    }
}
