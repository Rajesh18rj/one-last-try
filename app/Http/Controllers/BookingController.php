<?php

namespace App\Http\Controllers;

use App\Models\TherapistProfile;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function confirm(Request $request, TherapistProfile $therapist)
    {
        $therapist->load('user');

        return view('therapist.therapists.booking-confirm', [
            'therapist' => $therapist,
            'date'      => $request->date,
            'slot'      => $request->slot,
            'mode'      => $request->mode,
        ]);
    }


}
