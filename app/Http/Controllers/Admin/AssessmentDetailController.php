<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use Illuminate\Http\Request;

class AssessmentDetailController extends Controller
{
    public function index()
    {
        $assessments = Assessment::with('customer')
            ->latest()
            ->paginate(10);

        return view('admin.assessment-details.index', compact('assessments'));
    }

    public function updateReview(Request $request, Assessment $assessment)
    {
        $request->validate([
            'is_reviewed' => 'required|in:not_yet,reviewed'
        ]);

        $assessment->update([
            'is_reviewed' => $request->is_reviewed
        ]);

        return response()->json([
            'success' => true,
            'message' => $request->is_reviewed === 'reviewed'
                ? 'Assessment marked as Reviewed'
                : 'Assessment set to Not Reviewed'
        ]);
    }
}
