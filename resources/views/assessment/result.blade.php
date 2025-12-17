@extends('layouts.guest-new')

@section('content')

    @php
        $assessment = \App\Models\Assessment::where('customer_id', auth()->id())
            ->latest()
            ->first();

        if (!$assessment) {
            abort(404);
        }

        $severity = $assessment->severity_level;

        /* ---------------------------------------------
           Severity UI + Compliments
        --------------------------------------------- */
        $severityMap = [
            'minimal' => [
                'label' => 'Minimal',
                'bg' => 'bg-emerald-50',
                'text' => 'text-emerald-700',
                'icon' => 'fa-face-smile',
                'title' => 'You’re doing quite well 🌱',
                'message' => 'Your responses suggest that you are generally coping well emotionally. While everyone has ups and downs, you seem to have a healthy balance right now.'
            ],
            'mild' => [
                'label' => 'Mild',
                'bg' => 'bg-amber-50',
                'text' => 'text-amber-700',
                'icon' => 'fa-face-smile-wink',
                'title' => 'You’re managing, but some support may help 🌤️',
                'message' => 'You may be experiencing occasional stress or emotional discomfort. This is very common, and talking to someone could help you feel more at ease.'
            ],
            'moderate' => [
                'label' => 'Moderate',
                'bg' => 'bg-orange-50',
                'text' => 'text-orange-700',
                'icon' => 'fa-face-meh',
                'title' => 'You’ve been carrying a lot lately 💛',
                'message' => 'Your answers suggest noticeable emotional strain. Seeking support at this stage can make a meaningful difference before things feel overwhelming.'
            ],
            'severe' => [
                'label' => 'Severe',
                'bg' => 'bg-red-50',
                'text' => 'text-red-700',
                'icon' => 'fa-face-frown',
                'title' => 'You deserve care and understanding ❤️',
                'message' => 'It looks like you’ve been under significant emotional stress. You’re not weak for feeling this way — getting professional support can really help.'
            ],
            'critical' => [
                'label' => 'Critical',
                'bg' => 'bg-red-100',
                'text' => 'text-red-800',
                'icon' => 'fa-triangle-exclamation',
                'title' => 'You are not alone — help is important right now 🫂',
                'message' => 'Your responses indicate serious emotional distress. Please consider reaching out to a mental health professional or trusted person as soon as possible.'
            ],
        ];

        $ui = $severityMap[$severity] ?? $severityMap['minimal'];
    @endphp

    <div class="min-h-[75vh] flex items-center justify-center pt-28 pb-12
            bg-gradient-to-br from-[#FFF8ED] via-[#FFF3E0] to-[#FFF0D9]">

        <div class="max-w-3xl w-full px-4">

            <div class="bg-white/90 backdrop-blur-xl border border-[#FFD18A]
                    rounded-3xl shadow-2xl p-10">

                {{-- Header --}}
                <div class="text-center mb-8">
                    <div class="w-20 h-20 mx-auto mb-4 rounded-2xl
                            bg-gradient-to-br from-[#F79C23] to-[#FFB84D]
                            flex items-center justify-center shadow-xl">
                        <i class="fa-solid {{ $ui['icon'] }} text-white text-3xl"></i>
                    </div>

                    <h1 class="text-3xl font-black mb-2
                           bg-gradient-to-r from-[#F79C23] to-[#d88410]
                           bg-clip-text text-transparent">
                        Assessment Result
                    </h1>

                    <p class="text-sm text-gray-500">
                        Based on your recent responses
                    </p>
                </div>

                {{-- Severity Badge --}}
                <div class="flex justify-center mb-6">
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full
                             text-sm font-semibold {{ $ui['bg'] }} {{ $ui['text'] }}
                             border border-current/20">
                    <span class="w-2 h-2 rounded-full bg-current"></span>
                    {{ $ui['label'] }} Level
                </span>
                </div>

                {{-- Compliment / Explanation --}}
                <div class="text-center mb-8">
                    <h2 class="text-xl font-bold text-[#7A4A12] mb-3">
                        {{ $ui['title'] }}
                    </h2>

                    <p class="text-gray-700 leading-relaxed max-w-xl mx-auto">
                        {{ $ui['message'] }}
                    </p>
                </div>

                {{-- Gentle Note --}}
                <div class="bg-[#FFF3D6] border border-[#FFD18A]
                        rounded-2xl p-5 text-sm text-[#7A5A2E] mb-8">
                    <p>
                        ✨ This assessment is not a medical diagnosis.
                        It’s simply a tool to understand how you’re feeling and help guide you toward the right support.
                    </p>
                </div>

                {{-- Actions --}}
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('therapists.index') }}"
                       class="flex-1 inline-flex justify-center items-center gap-2
                          px-6 py-4 rounded-2xl font-bold text-white
                          bg-gradient-to-r from-[#F79C23] to-[#FF9F40]
                          shadow-xl hover:shadow-2xl hover:scale-[1.02] transition">
                        <i class="fa-solid fa-user-doctor"></i>
                        Find a Therapist
                    </a>

                    <a href="{{ route('assessment.create') }}"
                       class="flex-1 inline-flex justify-center items-center gap-2
                          px-6 py-4 rounded-2xl font-semibold
                          border border-[#F79C23]/60 text-[#F79C23]
                          hover:bg-[#FFF3D6] transition">
                        <i class="fa-solid fa-rotate-right"></i>
                        Retake Assessment
                    </a>
                </div>

                {{-- Emergency Note --}}
                @if($severity === 'critical')
                    <div class="mt-8 text-sm text-red-700 bg-red-50 border border-red-200 rounded-xl p-4">
                        ⚠️ If you are feeling unsafe or having thoughts of harming yourself,
                        please contact local emergency services or a mental health helpline immediately.
                    </div>
                @endif

            </div>
        </div>
    </div>

@endsection
