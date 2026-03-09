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
        $session = TherapySession::with('customer')
            ->where('therapist_id', auth()->id())
            ->findOrFail($id);

        return view('therapist.sessions.show', compact('session'));
    }

    public function update(Request $request, $id)
    {
        $session = TherapySession::findOrFail($id);

        $session->therapist_notes = $request->therapist_notes;
        $session->session_status = $request->session_status;

        $session->save();

        return redirect()->back()->with('success', 'Session updated successfully');
    }
}
