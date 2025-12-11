<?php

namespace App\Http\Controllers;

use App\Models\TherapistProfile;
use Illuminate\Http\Request;

class TherapistsController extends Controller
{
    public function index()
    {
        $therapists = TherapistProfile::with('user')
            ->where('approval_status', 'approved')->paginate(10);

        return view('therapist.therapists.index', compact('therapists'));
    }

    public function show($id)
    {
        $therapist = TherapistProfile::with('user')->findOrFail($id);

        return view('therapist.therapists.partials.therapist-profile-view', compact('therapist'));
    }

}