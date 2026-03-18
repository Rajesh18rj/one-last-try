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
                @include('assessment.result-partials.header-section')

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
                @include('assessment.result-partials.topics-section')

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

                <button
                    type="button"
                    data-url="{{ route('assessment.download',$assessment->id) }}"
                    id="downloadBtn"

                    class="inline-flex items-center gap-3
px-8 py-4 rounded-2xl
font-bold text-white
bg-gradient-to-r
from-purple-500
via-indigo-500
to-sky-500
shadow-lg transition-all duration-300">

                    <i class="fa-solid fa-download" id="downloadIcon"></i>

                    <span id="downloadText">
Download PDF
</span>

                    <i class="fa-solid fa-spinner fa-spin hidden"
                       id="downloadLoader"></i>

                    <i class="fa-solid fa-check hidden"
                       id="downloadSuccess"></i>

                </button>

            </div>

        </div>

    </div>

</div>


<!-- 🎉 Celebration Confetti -->
@include('assessment.result-partials.celebration-confetti')

<!-- Script for Download -->
<script>

    document.addEventListener('DOMContentLoaded',function(){

        const btn = document.getElementById('downloadBtn');

        btn.addEventListener('click',function(){

            const text = document.getElementById('downloadText');
            const icon = document.getElementById('downloadIcon');
            const loader = document.getElementById('downloadLoader');
            const success = document.getElementById('downloadSuccess');

            const url = btn.dataset.url;

            // Preparing
            text.textContent="Preparing PDF...";

            icon.style.display="none";

            loader.style.display="inline-block";

            btn.disabled=true;


            setTimeout(()=>{

                // Downloading
                text.textContent="Downloading...";

                // hidden iframe download (no white page)
                let iframe=document.getElementById('pdfDownloadFrame');

                if(!iframe){

                    iframe=document.createElement('iframe');

                    iframe.style.display='none';

                    iframe.id='pdfDownloadFrame';

                    document.body.appendChild(iframe);

                }

                iframe.src=url;

            },800);


            setTimeout(()=>{

                // Success
                loader.style.display="none";

                success.style.display="inline-block";

                text.textContent="Downloaded ✓";

            },2500);


            setTimeout(()=>{

                // Reset
                text.textContent="Download again";

                success.style.display="none";

                icon.style.display="inline-block";

                btn.disabled=false;

            },4500);

        });

    });

</script>

@endsection
