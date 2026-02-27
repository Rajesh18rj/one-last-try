<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TherapySession;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AssignTherapistController extends Controller
{
    // LIST PAGE
    public function index()
    {
        $assignments = TherapySession::with(['customer','therapist'])
            ->latest()
            ->paginate(10);

        $customers = User::where('role','customer')->get();
        $therapists = User::where('role','therapist')->get();

        return view('admin.assign-therapist.index',
            compact('assignments','customers','therapists'));
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'customer_id'     => 'required|exists:users,id',
            'therapist_id'    => 'required|exists:users,id',
            'scheduled_at'    => 'nullable|date',
            'duration_minutes'=> 'nullable|integer',
            'fee'             => 'nullable|numeric',
            'meeting_link'    => 'nullable|url',
            'status'          => 'required',
            'customer_notes'  => 'nullable|string',
        ]);

        // prevent duplicate assignment
        $already = TherapySession::where('customer_id',$request->customer_id)->exists();

        if($already){
            return back()->with('error','Customer already assigned to a therapist.');
        }

        TherapySession::create([
            'customer_id'      => $request->customer_id,
            'therapist_id'     => $request->therapist_id,
            'assessment_id'    => $request->assessment_id,
            'scheduled_at'     => $request->scheduled_at,
            'duration_minutes' => $request->duration_minutes ?? 60,
            'fee'              => $request->fee,
            'status'           => $request->status,
            'meeting_link'     => $request->meeting_link,
            'customer_notes'   => $request->customer_notes,
        ]);

        return redirect()->route('admin.assign.therapist.index')
            ->with('success','Therapist assigned & session scheduled successfully!');
    }

    // DELETE
    public function destroy($id)
    {
        TherapySession::findOrFail($id)->delete();

        return back()->with('success','Assignment removed');
    }

    public function availability($id)
    {
        $therapist = User::with('therapistProfile')->findOrFail($id);
        $profile = $therapist->therapistProfile;

        return response()->json([
            'days'  => $profile?->available_days ?? [],
            'slots' => $profile?->available_time_slots ?? [],
            'fee'   => $profile?->session_fee,
            'mode'  => $profile?->session_mode,
        ]);
    }
}
