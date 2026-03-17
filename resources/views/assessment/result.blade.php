@extends('layouts.guest-new')

@section('content')
@php

    $file = resource_path('views/assessment/result-partials/text.blade.php');

    $levelMap = [];
    $topicIcons = [];
    $topicTips = [];

    if (file_exists($file)) {
    include_once $file;
    }

    $assessment = \App\Models\Assessment::where('customer_id', auth()->id())
    ->latest()
    ->first();

    if (!$assessment) {
    abort(404);
    }

    $level = $assessment->overall_level;
    $topics = $assessment->topic_scores ?? [];

    // Move Ikigai last
    if (array_key_exists('ikigai', $topics)) {
    $ikigai = $topics['ikigai'];
    unset($topics['ikigai']);
    $topics['ikigai'] = $ikigai;
    }

    $ui = $levelMap[$level] ?? ($levelMap['Good'] ?? []);


    //score
    $total = 180;

    $score = (int) ($assessment->overall_score ?? 0);

    $overallPercentage = $total > 0
        ? round(($score / $total) * 100)
        : 0;

    $overallPercentage = max(0,min(100,$overallPercentage));

@endphp

<div class="relative min-h-[75vh] flex items-center justify-center pt-20 pb-12
bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 overflow-hidden">

    <!-- Color mesh background -->
    <div class="absolute inset-0 pointer-events-none">

        <div class="absolute -top-32 -left-32 w-[420px] h-[420px]
bg-purple-300 rounded-full blur-[120px] opacity-30">
        </div>

        <div class="absolute top-40 -right-32 w-[420px] h-[420px]
bg-sky-300 rounded-full blur-[120px] opacity-30"></div>

        <div class="absolute bottom-0 left-1/4 w-[420px] h-[420px]
bg-pink-300 rounded-full blur-[120px] opacity-30">
        </div>

        <div class="absolute bottom-20 right-1/3 w-[350px] h-[350px]
bg-emerald-300 rounded-full blur-[120px] opacity-25">
        </div>

    </div>

    <div class="relative max-w-5xl w-full px-4">

        <div class="bg-white/85 backdrop-blur-xl
border border-white/40
rounded-3xl
shadow-[0_25px_70px_rgba(0,0,0,0.08)]
p-10">

            <!-- Header -->
            <div class="text-center mb-14 relative">

                <!-- Glow ring -->
                <div class="absolute left-1/2 -translate-x-1/2 -top-6
    w-40 h-40 bg-gradient-to-br from-purple-300 via-indigo-300 to-sky-300
    rounded-full blur-3xl opacity-30"></div>

                <!-- Icon container -->
                <div class="relative w-24 h-24 mx-auto mb-6 rounded-3xl

    bg-gradient-to-br
    from-purple-500
    via-indigo-500
    to-sky-500

    flex items-center justify-center

    shadow-[0_20px_50px_rgba(99,102,241,0.35)]

    border border-white/40">

                    <!-- Inner shine -->
                    <div class="absolute inset-0 rounded-3xl
        bg-white/10 backdrop-blur-sm"></div>

                    <i class="relative fa-solid {{ $ui['icon'] }}
        text-white text-4xl"></i>

                </div>

                <!-- Title -->
                <h1 class="text-4xl font-black mb-3

    bg-gradient-to-r
    from-purple-600
    via-indigo-600
    to-sky-500

    bg-clip-text text-transparent">

                    Your Assessment Summary

                </h1>

                <!-- Decorative divider -->
                <div class="flex items-center justify-center gap-3 mb-3">

                    <div class="h-[2px] w-16
        bg-gradient-to-r from-transparent to-purple-400"></div>

                    <div class="w-2 h-2 rounded-full bg-indigo-400"></div>

                    <div class="h-[2px] w-16
        bg-gradient-to-l from-transparent to-sky-400"></div>

                </div>

                <!-- Subtitle -->
                <p class="text-gray-500 text-sm tracking-wide">

                    Based on your recent responses

                </p>

                <!-- Optional badge -->
                <div class="mt-5">

        <span class="inline-flex items-center gap-2

        px-4 py-2 rounded-full

        bg-gradient-to-r
        from-indigo-50
        to-purple-50

        text-indigo-700
        text-xs font-semibold

        border border-indigo-100">

            <span class="w-2 h-2 rounded-full bg-indigo-400 animate-pulse"></span>

            Personalized Growth Insights

        </span>

                </div>

            </div>

            <!-- Score -->
            <div class="relative overflow-hidden

bg-gradient-to-br
from-purple-50
via-indigo-50
to-sky-50

border border-white/60
rounded-3xl
p-8
mb-12

shadow-[0_20px_60px_rgba(99,102,241,0.15)]">

                <!-- decorative glow -->
                <div class="absolute -top-20 -right-20 w-64 h-64
    bg-purple-300 rounded-full blur-3xl opacity-20"></div>

                <div class="absolute -bottom-20 -left-20 w-64 h-64
    bg-sky-300 rounded-full blur-3xl opacity-20"></div>

                <div class="relative flex items-center justify-between">

                    <div>

                        <div class="text-xs text-indigo-600
            font-bold uppercase tracking-widest">

                            Overall Wellbeing Score

                        </div>

                        <div class="text-6xl font-black mt-2

            bg-gradient-to-r
            from-purple-600
            via-indigo-600
            to-sky-500

            bg-clip-text text-transparent">

                            {{ $overallPercentage }}%

                        </div>

                        <div class="text-gray-500 mt-2 text-sm">
                            Based on all assessment areas
                        </div>

                    </div>

                    <!-- Score icon -->
                    <div class="relative">

                        <div class="absolute inset-0
            bg-gradient-to-br from-purple-400 to-indigo-400
            rounded-3xl blur-xl opacity-30"></div>

                        <div class="relative w-20 h-20 rounded-3xl

            bg-gradient-to-br
            from-purple-500
            via-indigo-500
            to-sky-500

            flex items-center justify-center

            shadow-[0_10px_30px_rgba(99,102,241,0.4)]

            border border-white/40">

                            <i class="fa-solid fa-chart-simple
                text-white text-2xl"></i>

                        </div>

                    </div>

                </div>

                <!-- Progress bar -->
                <div class="mt-8">

                    <div class="flex justify-between text-xs text-gray-500 mb-2">

                        <span>0%</span>

                        <span class="font-semibold text-indigo-600">
                {{ $overallPercentage }}%
            </span>

                        <span>100%</span>

                    </div>

                    <div class="w-full h-5

        bg-white/70
        rounded-full
        backdrop-blur

        shadow-inner">

                        <div class="h-5 rounded-full

            bg-gradient-to-r
            from-purple-500
            via-indigo-500
            via-blue-500
            to-sky-400

            shadow-[0_0_20px_rgba(99,102,241,0.5)]

            transition-all duration-1000 ease-out"

                             style="width: {{ $overallPercentage }}%;">

                        </div>

                    </div>

                </div>

            </div>

            <!-- Level -->
            <div class="flex justify-center mb-10">

                <span class="inline-flex items-center gap-3
px-6 py-3 rounded-2xl

text-sm font-bold

{{ $ui['bg'] }} {{ $ui['text'] }}

border border-current/20
shadow-sm">

                    <span class="w-3 h-3 rounded-full
bg-current animate-pulse"></span>

                    Overall Level : {{ $level }}

                </span>

            </div>

            <!-- Message -->
            <div class="text-center mb-14">

                <h2 class="text-2xl font-bold
text-gray-800 mb-4">

                    {{ $ui['title'] }}

                </h2>

                <p class="text-gray-600
leading-relaxed max-w-2xl mx-auto">

                    {{ $ui['message'] }}

                </p>

            </div>

            <!-- Divider -->
            <div class="flex items-center gap-4 mb-10">

                <div class="h-[2px] flex-1
bg-gradient-to-r
from-transparent
via-purple-300
to-transparent"></div>

                <div class="text-purple-500
font-semibold text-sm">

                    Your Growth Areas

                </div>

                <div class="h-[2px] flex-1
bg-gradient-to-r
from-transparent
via-indigo-300
to-transparent"></div>

            </div>

            <!-- Topics -->
            <div class="grid sm:grid-cols-2 gap-7 mb-12">

                @foreach ($topics as $topic => $data)
                @php

                $color = $topicColors[$topic] ?? [
                'bg' => 'from-gray-50 to-gray-100',
                'icon' => 'from-gray-400 to-gray-600',
                'text' => 'text-gray-800',
                'progress' => 'from-gray-400 to-gray-600',
                ];

                @endphp

                @if ($topic === 'ikigai')
                <div class="bg-gradient-to-br from-indigo-50 to-purple-50
border border-indigo-100
rounded-3xl p-8 text-center shadow-md">

                    <div class="w-16 h-16 mx-auto mb-4 rounded-2xl

bg-gradient-to-br from-indigo-500 to-purple-500

flex items-center justify-center
shadow-[0_10px_25px_rgba(99,102,241,0.35)]">

                        <i class="fa-solid fa-compass text-white text-xl"></i>

                    </div>

                    <h3 class="font-bold text-indigo-800 mb-2">
                        Ikigai Insight
                    </h3>

                    <p class="text-indigo-700 text-sm">
                        Your personalized Ikigai insight will be shared via email.
                    </p>

                </div>
                @else
                <div class="bg-gradient-to-br {{ $color['bg'] }}

border border-white/60
rounded-3xl
p-7

shadow-sm
hover:shadow-xl

transition-all duration-300

hover:-translate-y-1
hover:scale-[1.02]">

                    <div class="flex items-center gap-4 mb-4">

                        <div class="w-12 h-12 rounded-2xl

bg-gradient-to-br {{ $color['icon'] }}

flex items-center justify-center

shadow-[0_8px_20px_rgba(0,0,0,0.15)]">

                            <i class="fa-solid {{ $topicIcons[$topic] ?? 'fa-circle' }}
text-white text-lg"></i>

                        </div>

                        <h3 class="font-bold {{ $color['text'] }} capitalize text-lg">

                            {{ ucwords(str_replace('_', ' ', $topic)) }}

                        </h3>

                    </div>

                    <div class="flex justify-between items-center mb-4">

                        <span class="text-xs font-bold px-3 py-1 rounded-xl

                                        @if ($data['level'] == 'Excellent') bg-emerald-100 text-emerald-700
                                        @elseif($data['level'] == 'Good')
                                        bg-blue-100 text-blue-700
                                        @elseif($data['level'] == 'Moderate')
                                        bg-amber-100 text-amber-700
                                        @else
                                        bg-red-100 text-red-600 @endif">

                            {{ $data['level'] }}

                        </span>

                        <span class="font-bold {{ $color['text'] }}
                                    bg-white/70 px-3 py-1 rounded-lg shadow-sm">

                            {{ $data['percentage'] }}%

                        </span>

                    </div>

                    <div class="w-full h-3 bg-white/60
                                    rounded-full mb-4">

                        <div class="h-3 rounded-full

                                    bg-gradient-to-r {{ $color['progress'] }}

                                    shadow-[0_0_10px_rgba(0,0,0,0.15)]

                                    transition-all duration-700" style="width:{{ $data['percentage'] }}%">
                        </div>

                    </div>

                    <p class="text-sm {{ $color['text'] }} leading-relaxed">

                        💡 {{ $topicTips[$topic][$data['level']] ?? 'Small mindful steps help growth.' }}

                    </p>

                </div>
                @endif
                @endforeach

            </div>

            <!-- Note -->

            <div class="bg-gradient-to-r
                    from-purple-50
                    to-indigo-50

                    border border-indigo-100

                    rounded-2xl
                    p-6
                    text-gray-700
                    mb-10">

                ✨ This assessment is a self-reflection tool.

            </div>

            <!-- Download Section -->

            <div class="bg-gradient-to-r
from-indigo-50
via-purple-50
to-sky-50

border border-indigo-100
rounded-3xl
p-8
text-center

shadow-lg">

                <div class="w-16 h-16 mx-auto mb-4

    bg-gradient-to-br
    from-indigo-500
    to-purple-500

    rounded-2xl

    flex items-center justify-center

    shadow-lg">

                    <i class="fa-solid fa-file-pdf
        text-white text-xl"></i>

                </div>

                <h3 class="text-xl font-bold text-indigo-800 mb-2">

                    Download Your Result

                </h3>

                <p class="text-gray-600 text-sm mb-6">

                    Save your assessment report as a PDF for future reference.

                </p>

                <a href="{{ route('assessment.download',$assessment->id) }}"

                   class="inline-flex items-center gap-3

       px-8 py-4 rounded-2xl

       font-bold text-white

       bg-gradient-to-r
       from-purple-500
       via-indigo-500
       to-sky-500

       shadow-lg hover:shadow-xl

       transition-all duration-300

       hover:-translate-y-1">

                    <i class="fa-solid fa-download"></i>

                    Download PDF

                </a>

            </div>

        </div>

    </div>

</div>


<!-- 🎉 Celebration Confetti -->
@include('assessment.result-partials.celebration-confetti')
@endsection
