@extends('layouts.guest-new')

@section('content')

    @php
        $assessment = \App\Models\Assessment::where('customer_id', auth()->id())
            ->latest()
            ->first();

        if (!$assessment) {
            abort(404);
        }

        $level  = $assessment->overall_level;
        $topics = $assessment->topic_scores ?? [];

        /* ---------------------------------------------
           Overall Level UI (NON-CLINICAL)
        --------------------------------------------- */
        $levelMap = [
            'Excellent' => [
                'bg' => 'bg-emerald-50',
                'text' => 'text-emerald-700',
                'icon' => 'fa-face-smile-beam',
                'title' => 'You’re doing great 🌟',
                'message' => 'Your responses reflect strong balance, awareness, and emotional wellbeing. Keep nurturing these habits.'
            ],
            'Good' => [
                'bg' => 'bg-lime-50',
                'text' => 'text-lime-700',
                'icon' => 'fa-face-smile',
                'title' => 'You’re on a healthy path 🌱',
                'message' => 'You’re doing well overall. With a little mindful attention, things can feel even better.'
            ],
            'Moderate' => [
                'bg' => 'bg-amber-50',
                'text' => 'text-amber-700',
                'icon' => 'fa-face-meh',
                'title' => 'Some areas need care 💛',
                'message' => 'You may be experiencing imbalance in certain areas. Small, steady changes can make a big difference.'
            ],
            'Needs Attention' => [
                'bg' => 'bg-orange-50',
                'text' => 'text-orange-700',
                'icon' => 'fa-face-frown',
                'title' => 'It’s okay to pause and reflect 🤍',
                'message' => 'Some areas may need extra care and support. You don’t have to figure it out alone.'
            ],
        ];

        $ui = $levelMap[$level] ?? $levelMap['Good'];

        /* ---------------------------------------------
           Personalised Tips Per Topic
        --------------------------------------------- */
        $topicTips = [

            'emotional_intelligence' => [
                'Excellent' => 'You’re highly aware of your emotions. Continue reflecting or journaling to maintain this strength.',
                'Good' => 'Pausing before reacting in stressful moments can deepen emotional control.',
                'Moderate' => 'Try naming your emotions during the day to build awareness.',
                'Needs Attention' => 'Mindfulness or guided reflection can help you understand emotions better.',
            ],

            'personality' => [
                'Excellent' => 'You show strong self-awareness. Keep embracing your natural strengths.',
                'Good' => 'Observing your behavior patterns can bring useful insights.',
                'Moderate' => 'Self-reflection exercises can help clarify your preferences.',
                'Needs Attention' => 'Exploring personality frameworks may offer helpful direction.',
            ],

            'slumber_score' => [
                'Excellent' => 'Your sleep habits are healthy. Keep your routine consistent.',
                'Good' => 'Reducing screen time before bed may improve rest.',
                'Moderate' => 'A fixed bedtime and calming routine can help.',
                'Needs Attention' => 'Focus on sleep hygiene: dark, quiet, and consistent sleep timing.',
            ],

            'emotional_eating' => [
                'Excellent' => 'You have good awareness around food and emotions.',
                'Good' => 'Pause briefly before eating to check emotional vs physical hunger.',
                'Moderate' => 'Identifying emotional triggers can reduce emotional eating.',
                'Needs Attention' => 'Replacing emotional eating with alternative coping habits may help.',
            ],

            'entrepreneur_employee' => [
                'Excellent' => 'You show strong decision confidence. Keep trusting your instincts.',
                'Good' => 'Balancing risk and stability can support growth.',
                'Moderate' => 'Clarifying long-term goals may guide your career choices.',
                'Needs Attention' => 'Reflecting on responsibility and uncertainty can bring clarity.',
            ],

            'swot' => [
                'Excellent' => 'You understand your strengths and opportunities well.',
                'Good' => 'Revisiting goals regularly strengthens self-awareness.',
                'Moderate' => 'Writing a simple personal SWOT can improve clarity.',
                'Needs Attention' => 'Identifying one strength and one opportunity is a good start.',
            ],

            'interpersonal_skills' => [
                'Excellent' => 'Your communication skills are strong. Keep nurturing relationships.',
                'Good' => 'Active listening can further improve interactions.',
                'Moderate' => 'Practicing empathy during conversations may help.',
                'Needs Attention' => 'Clear and calm communication can strengthen connections.',
            ],

            'emotional_stability' => [
                'Excellent' => 'You manage stress very well. Maintain your coping strategies.',
                'Good' => 'Short breaks and relaxation can help during busy days.',
                'Moderate' => 'Stress-management techniques may improve balance.',
                'Needs Attention' => 'Building daily calming routines can help regulate emotions.',
            ],

            'ikigai' => [
                'Excellent' => 'You have a strong sense of purpose. Keep aligning actions with values.',
                'Good' => 'Reflecting on what energizes you can deepen fulfillment.',
                'Moderate' => 'Exploring meaningful activities may bring clarity.',
                'Needs Attention' => 'Small purpose-driven goals can help restore motivation.',
            ],
        ];
    @endphp

    <div class="min-h-[75vh] flex items-center justify-center pt-28 pb-12
            bg-gradient-to-br from-[#FFF8ED] via-[#FFF3E0] to-[#FFF0D9]">

        <div class="max-w-5xl w-full px-4">

            <div class="bg-white/90 backdrop-blur-xl border border-[#FFD18A]
                    rounded-3xl shadow-2xl p-10">

                {{-- Header --}}
                <div class="text-center mb-10">
                    <div class="w-20 h-20 mx-auto mb-4 rounded-2xl
                            bg-gradient-to-br from-[#F79C23] to-[#FFB84D]
                            flex items-center justify-center shadow-xl">
                        <i class="fa-solid {{ $ui['icon'] }} text-white text-3xl"></i>
                    </div>

                    <h1 class="text-3xl font-black mb-2
                           bg-gradient-to-r from-[#F79C23] to-[#d88410]
                           bg-clip-text text-transparent">
                        Your Assessment Summary
                    </h1>

                    <p class="text-sm text-gray-500">
                        Based on your recent responses
                    </p>
                </div>

                {{-- Overall Level --}}
                <div class="flex justify-center mb-8">
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full
                             text-sm font-semibold {{ $ui['bg'] }} {{ $ui['text'] }}
                             border border-current/20">
                    <span class="w-2 h-2 rounded-full bg-current"></span>
                    Overall Level: {{ $level }}
                </span>
                </div>

                {{-- Overall Message --}}
                <div class="text-center mb-12">
                    <h2 class="text-xl font-bold text-[#7A4A12] mb-3">
                        {{ $ui['title'] }}
                    </h2>

                    <p class="text-gray-700 leading-relaxed max-w-2xl mx-auto">
                        {{ $ui['message'] }}
                    </p>
                </div>

                {{-- Topic-wise Results + Tips --}}
                <div class="grid sm:grid-cols-2 gap-6 mb-12">

                    @foreach($topics as $topic => $data)
                        <div class="bg-[#FFF8ED] border border-[#FFD18A]
                                rounded-2xl p-5">

                            <h3 class="font-bold text-[#7A4A12] mb-1 capitalize">
                                {{ str_replace('_', ' ', $topic) }}
                            </h3>

                            <div class="flex items-center justify-between text-sm mb-2">
                            <span class="text-gray-600">
                                {{ $data['level'] }}
                            </span>

                                <span class="font-semibold text-[#F79C23]">
                                {{ $data['percentage'] }}%
                            </span>
                            </div>

                            {{-- Progress Bar --}}
                            <div class="w-full h-2 rounded-full bg-[#FFE2A8] mb-3">
                                <div class="h-2 rounded-full bg-gradient-to-r
                                        from-[#F79C23] to-[#FFB84D]"
                                     style="width: {{ $data['percentage'] }}%">
                                </div>
                            </div>

                            {{-- Personalised Tip --}}
                            <p class="text-sm text-[#7A5A2E] leading-relaxed">
                                💡 {{ $topicTips[$topic][$data['level']] ?? 'Small mindful steps can create positive change.' }}
                            </p>
                        </div>
                    @endforeach

                </div>

                {{-- Note --}}
                <div class="bg-[#FFF3D6] border border-[#FFD18A]
                        rounded-2xl p-5 text-sm text-[#7A5A2E] mb-8">
                    ✨ This assessment is a self-reflection tool, not a medical diagnosis.
                    It helps you understand patterns and areas for growth.
                </div>

                {{-- Actions --}}
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('therapists.index') }}"
                       class="flex-1 inline-flex justify-center items-center gap-2
                          px-6 py-4 rounded-2xl font-bold text-white
                          bg-gradient-to-r from-[#F79C23] to-[#FF9F40]
                          shadow-xl hover:shadow-2xl hover:scale-[1.02] transition">
                        <i class="fa-solid fa-user-doctor"></i>
                        Explore Guidance
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

            </div>
        </div>
    </div>

@endsection
