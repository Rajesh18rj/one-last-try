<?php

namespace App\Http\Controllers\Therapist;

use App\Http\Controllers\Controller;
use App\Models\TherapySession;
use Illuminate\Http\Request;

class TherapistSessionController extends Controller
{
    public function index()
    {
        $sessions = TherapySession::with('customer')
            ->where('therapist_id', auth()->id())
            ->latest()
            ->get();

        return view('therapist.assigned-sessions.index', compact('sessions'));
    }

    public function show($id)
    {
        $session = Session::with('customer')
            ->where('therapist_id', auth()->id())
            ->findOrFail($id);

        return view('therapist.sessions.show', compact('session'));
    }
}
