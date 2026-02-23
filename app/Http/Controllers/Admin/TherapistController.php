<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TherapistProfile;
use App\Models\User;
use Illuminate\Http\Request;

class TherapistController extends Controller
{
    public function index()
    {
        $therapists = TherapistProfile::with('user')
            ->latest()
            ->paginate(10);

        return view('admin.therapists.index', compact('therapists'));
    }

    public function show($id)
    {
        $therapist = \App\Models\TherapistProfile::with('user')->findOrFail($id);

        return response()->json([
            'name' => $therapist->user->name,
            'email' => $therapist->user->email,
            'phone' => $therapist->user->phone,
            'title' => $therapist->professional_title,
            'experience' => $therapist->experience_years,
            'fee' => $therapist->session_fee,
            'gender' => $therapist->gender,
            'city' => $therapist->city,
            'state' => $therapist->state,
            'bio' => $therapist->bio,
            'status' => $therapist->approval_status,
            'qualifications' => $therapist->qualifications,
            'mode' => $therapist->session_mode,
            'plan' => $therapist->plan_type,
            'image' => $therapist->profile_image,
            'languages' => $therapist->languages ?? [],
            'specializations' => $therapist->specializations ?? [],
            'documents' => $therapist->qualification_documents ?? [],
            'available_days' => $therapist->available_days ?? [],
            'available_time_slots' => $therapist->available_time_slots ?? [],
        ]);
    }

    public function update(Request $request, $id)
    {
        $therapist = TherapistProfile::findOrFail($id);

        $therapist->update([
            'approval_status'   => $request->approval_status,
            'plan_type' => $request->plan_type,
        ]);

        return redirect()->back()->with('success', 'Therapist updated successfully.');
    }
}
