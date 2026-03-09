<?php

namespace App\Http\Controllers\Therapist;

use App\Http\Controllers\Controller;
use App\Models\TherapistProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditTherapistController extends Controller
{
    /**
     * Show profile edit page
     */
    public function edit()
    {
        $user = Auth::user();

        $profile = TherapistProfile::firstOrCreate(
            ['user_id' => $user->id]
        );

        return view('therapist.edit-profile.index', compact('user', 'profile'));
    }


    /**
     * Update therapist profile
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',

            'gender' => 'nullable|in:male,female,other',
            'professional_title' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer',
            'bio' => 'nullable|string',
            'session_mode' => 'nullable|in:online,in_person,both',
            'session_fee' => 'nullable|numeric',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'profile_image' => 'nullable|image|max:2048',
        ]);


        /**
         * Update users table
         */
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);


        /**
         * Get therapist profile
         */
        $profile = TherapistProfile::firstOrCreate([
            'user_id' => $user->id
        ]);


        /**
         * Handle profile image
         */
        if ($request->hasFile('profile_image')) {

            $imagePath = $request->file('profile_image')
                ->store('therapists', 'public');

            $profile->profile_image = $imagePath;
        }


        /**
         * Update therapist profile
         */
        $profile->update([
            'gender' => $request->gender,
            'professional_title' => $request->professional_title,
            'experience_years' => $request->experience_years,
            'bio' => $request->bio,
            'session_mode' => $request->session_mode,
            'session_fee' => $request->session_fee,
            'city' => $request->city,
            'state' => $request->state,
        ]);


        return redirect()
            ->back()
            ->with('success', 'Profile updated successfully.');

    }
}
