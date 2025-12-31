<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // Fetch only users with role = customer
        $customers = User::where('role', 'customer')
            ->latest()
            ->paginate(10);

        return view('admin.customers.index', compact('customers'));
    }

    public function update(Request $request, $id)
    {
        // Prevent admin from changing own role
        if (auth()->id() == $id) {
            return redirect()
                ->route('admin.customers.index')
                ->with('error', 'You cannot change your own role.');
        }

        $request->validate([
            'role' => 'required|in:customer,trainee,therapist,admin',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'role' => $request->role,
        ]);

        return redirect()
            ->route('admin.customers.index')
            ->with('success', 'User role updated successfully.');
    }



}
