<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssessmentController extends Controller
{
    public function create()
    {
        return view('assessment.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|array',
            'answers.*.*' => 'required|integer|min:0|max:3',
        ]);

        $answers = $data['answers'];

        $topicScores = [];
        $totalScore = 0;

        foreach ($answers as $topic => $values) {
            $score = array_sum($values);
            $topicScores[$topic] = $score;
            $totalScore += $score;
        }

        // Overall severity (simple & understandable)
        $severity = match (true) {
            $totalScore <= 10 => 'minimal',
            $totalScore <= 20 => 'mild',
            $totalScore <= 30 => 'moderate',
            $totalScore <= 40 => 'severe',
            default => 'critical',
        };

        // 🚨 Emergency override (self-harm thoughts)
        if (($answers['depression']['q3'] ?? 0) > 0) {
            $severity = 'critical';
        }

        Assessment::create([
            'customer_id'    => Auth::id(),
            'answers'        => $answers,
            'overall_score'  => $totalScore,
            'severity_level' => $severity,
            'status'         => 'completed',
            'taken_at'       => now(),
        ]);

        return redirect()
            ->route('assessment.result')
            ->with('success', 'Assessment submitted successfully.');
    }
}
