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

        return view('admin.assign-therapist.index', compact('assignments'));
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
        if($request->scheduled_at){
            $already = TherapySession::where('customer_id',$request->customer_id)
                ->where('scheduled_at',$request->scheduled_at)
                ->exists();

            if($already){
                return back()->with('error','Customer already has a session at this time.');
            }
        }

        if ($request->scheduled_at) {
            $scheduled = Carbon::parse($request->scheduled_at);

            if ($scheduled->isPast()) {
                return back()->with('error','You cannot schedule a session in the past.');
            }
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

    public function searchCustomers(Request $request)
    {
        $q = $request->q;

        return User::where('role','customer')
            ->where(function($query) use ($q){
                $query->where('name','like',"%$q%")
                    ->orWhere('email','like',"%$q%");
            })
            ->limit(10)
            ->get(['id','name','email']);
    }

    public function searchTherapists(Request $request)
    {
        $q = $request->q;

        return User::where('role','therapist')
            ->where(function($query) use ($q){
                $query->where('name','like',"%$q%")
                    ->orWhere('email','like',"%$q%");
            })
            ->limit(10)
            ->get(['id','name','email']);
    }

    public function update(Request $request, $id)
    {
        $session = TherapySession::findOrFail($id);

        $request->validate([
            'fee' => 'nullable|numeric',
            'status' => 'required',
            'meeting_link' => 'nullable|url'
        ]);

        $session->update([
            'fee' => $request->fee,
            'status' => $request->status,
            'meeting_link' => $request->meeting_link,
        ]);

        return back()->with('success','Session updated successfully.');
    }
}
