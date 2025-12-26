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
            'answers.*.*' => 'required|integer|min:0|max:4',

            // ikigai text inputs
            'answers.ikigai.love'  => 'required|string|max:255',
            'answers.ikigai.skill' => 'required|string|max:255',
            'answers.ikigai.need'  => 'required|string|max:255',
            'answers.ikigai.paid'  => 'required|string|max:255',
        ]);

        $answers = $data['answers'];

        $topicResults = [];
        $totalScore = 0;
        $totalMaxScore = 0;

        foreach ($answers as $topic => $values) {

            // Convert values to integers
            $numericValues = array_map('intval', $values);

            $topicScore = array_sum($numericValues);
            $questionCount = count($numericValues);
            $topicMax = $questionCount * 4;

            $percentage = $topicMax > 0
                ? round(($topicScore / $topicMax) * 100)
                : 0;

            $level = match (true) {
                $percentage >= 80 => 'Excellent',
                $percentage >= 60 => 'Good',
                $percentage >= 40 => 'Moderate',
                default           => 'Needs Attention',
            };

            $topicResults[$topic] = [
                'score'      => $topicScore,
                'max_score'  => $topicMax,
                'percentage' => $percentage,
                'level'      => $level,
            ];

            $totalScore += $topicScore;
            $totalMaxScore += $topicMax;
        }

        $overallPercentage = $totalMaxScore > 0
            ? round(($totalScore / $totalMaxScore) * 100)
            : 0;

        $overallLevel = match (true) {
            $overallPercentage >= 80 => 'Excellent',
            $overallPercentage >= 60 => 'Good',
            $overallPercentage >= 40 => 'Moderate',
            default                  => 'Needs Attention',
        };

        Assessment::create([
            'customer_id'   => auth()->id(),
            'answers'       => $answers,
            'topic_scores'  => $topicResults,   // ✅ FIX
            'overall_score' => $totalScore,
            'overall_level' => $overallLevel,   // ✅ FIX
            'status'        => 'completed',
            'taken_at'      => now(),
        ]);

        return redirect()
            ->route('assessment.result')
            ->with('success', 'Assessment submitted successfully.');
    }

}
