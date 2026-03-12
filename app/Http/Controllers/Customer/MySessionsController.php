<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\TherapySession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MySessionsController extends Controller
{
    public function index()
    {

        $sessions = TherapySession::with('therapist')

            ->where('customer_id',Auth::id())

            ->orderBy('scheduled_at','desc')

            ->get();

        return view(
            'customer.your-sessions.index',
            compact('sessions')
        );

    }

    public function updateNotes(Request $request, TherapySession $session)
    {

        $request->validate([

            'notes'=>'nullable|string|max:2000'

        ]);

        $session->customer_notes = $request->notes;

        $session->save();

        return response()->json([

            'success'=>true,
            'message'=>'Feedback updated successfully'

        ]);

    }
}
