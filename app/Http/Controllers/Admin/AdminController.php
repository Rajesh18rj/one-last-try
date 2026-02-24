<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch only users with role = customer
        $admins = User::where('role', 'admin')
            ->latest()
            ->paginate(10);

        return view('admin.admins.index', compact('admins'));
    }

    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);

        // prevent self role change
        if (auth()->id() == $admin->id) {
            return back()->with('error', 'You cannot modify yourself');
        }

        $request->validate([
            'role' => 'required|in:admin,therapist,trainee,customer'
        ]);

        $admin->update([
            'role' => $request->role
        ]);

        return back()->with('success', 'Admin role updated');
    }
}
