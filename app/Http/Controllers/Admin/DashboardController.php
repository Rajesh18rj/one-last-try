<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = User::where('role', 'customer')->count();

        $totalTherapists = User::where('role', 'therapist')
            ->whereHas('therapistProfile', function ($q) {
                $q->where('approval_status', 'approved');
            })
            ->count();

        $totalAdmins = User::where('role', 'admin')->count();

        return view('admin.admin-dashboard.index',
            compact('totalCustomers', 'totalTherapists', 'totalAdmins'));
    }
}
