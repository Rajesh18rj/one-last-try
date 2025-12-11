<?php

namespace App\Http\Controllers;

use App\Models\TherapistProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TherapistRegisterController extends Controller
{
    public function create()
    {
        return view('therapist.join-therapist.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'                => 'required|string|max:255',
            'email'               => 'required|email|unique:users',
            'password'            => 'required|confirmed|min:6',
            'phone'               => 'required|numeric',

            'gender'              => 'required|string',
            'professional_title'  => 'required|string',
            'qualifications'      => 'required|string',

            'experience_years'    => 'required|numeric',
            'bio'                 => 'required|string',

            'specializations'     => 'required|array',
            'languages'           => 'required|array',

            'session_mode'        => 'required|nullable|string',
            'session_fee'         => 'required|numeric',

            // Available days validation
            'available_days' => 'required|array|min:1',
            'available_days.*' => 'required|string',

            // Time slots validation
            'available_time_slots' => 'required|array|min:1',
            'available_time_slots.*' => 'required|array|min:1',
            'available_time_slots.*.*.start' => 'required|string|date_format:H:i',
            'available_time_slots.*.*.end'   => 'required|string|date_format:H:i',

            'city'     => 'required|string',
            'state'    => 'required|string',
            'pin_code' => 'required|string',
            'country'  => 'required|string',

            'profile_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',

            'qualification_documents' => 'required|array|max:5',
            'qualification_documents.*' => 'file|mimes:pdf,jpg,jpeg,png|max:5120',

//            'accept_terms' => 'required'
        ]);

        // Upload Profile Image
        $profileImage = $request->hasFile('profile_image')
            ? $request->file('profile_image')->store('therapist_images', 'public')
            : null;

        // Upload Qualification Documents
        $qualificationFiles = [];
        if ($request->hasFile('qualification_documents')) {
            foreach ($request->file('qualification_documents') as $file) {
                $qualificationFiles[] = $file->store('therapist_documents', 'public');
            }
        }

        // Create Login User
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone'    => $validated['phone'],
            'role'     => 'therapist',
        ]);

        TherapistProfile::create([
            'user_id'              => $user->id,
            'gender'               => $validated['gender'],
            'professional_title'   => $validated['professional_title'],
            'qualifications'       => $validated['qualifications'],
            'experience_years'     => $validated['experience_years'],
            'bio'                  => $validated['bio'],

            'specializations'      => json_encode($validated['specializations']),
            'languages'           => json_encode($validated['languages']),
            'session_mode'         => $validated['session_mode'],
            'session_fee'          => $validated['session_fee'],

            'available_days'       => json_encode($validated['available_days']),
            'available_time_slots' => json_encode($validated['available_time_slots'] ?? []),

            'city'                 => $validated['city'],
            'state'                => $validated['state'],
            'country'              => $validated['country'],
            'pin_code'             => $validated['pin_code'],

            'qualification_documents' => !empty($qualificationFiles)
                ? json_encode($qualificationFiles)
                : null,

            'profile_image'        => $profileImage,
            'approval_status'      => 'pending',
        ]);

        return redirect()->route('therapist.submitted')->with(
            'success',
            'Your details were submitted successfully! Please wait for admin approval.'
        );

    }
}
