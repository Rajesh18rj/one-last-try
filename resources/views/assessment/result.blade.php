@extends('layouts.guest-new')

@section('content')

    @php
        $assessment = auth()->user()
            ->latest()
            ->first();

        $severityColors = [
            'minimal'  => ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-700', 'label' => 'Minimal'],
            'mild'     => ['bg' => 'bg-amber-50',   'text' => 'text-amber-700',   'label' => 'Mild'],
            'moderate' => ['bg' => 'bg-orange-50',  'text' => 'text-orange-700',  'label' => 'Moderate'],
            'severe'   => ['bg' => 'bg-red-50',     'text' => 'text-red-700',     'label' => 'Severe'],
            'critical' => ['bg' => 'bg-red-100',    'text' => 'text-red-800',     'label' => 'Critical'],
        ];

        $severity = $assessment->severity_level ?? 'minimal';
        $style = $severityColors[$severity];

        $answers = $assessment->answers ?? [];

        $topicScores = [];
        foreach ($answers as $topic => $values) {
            $topicScores[$topic] = array_sum($values);
        }

        arsort($topicScores);
        $topIssues = array_slice(array_keys($topicScores), 0, 2);
    @endphp

    <div class="min-h-[75vh] flex items-center justify-center pt-28 pb-10 relative overflow-hidden
                bg-[radial-gradient(circle_at_top,_#fed7aa55,_#fff7ed),radial-gradient(circle_at_bottom,_#fecaca55,_#fff7ed)]">

        {{-- soft blobs --}}
        <div class="pointer-events-none absolute -top-32 -left-16 w-72 h-72
                    bg-gradient-to-br from-amber-300/55 via-orange-300/35 to-yellow-200/30
                    rounded-full blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-40 -right-0 w-80 h-80
                    bg-gradient-to-tr from-orange-400/35 via-rose-300/30 to-amber-200/30
                    rounded-full blur-3xl"></div>

        {{-- subtle container background --}}
        <div class="pointer-events-none absolute inset-x-0 top-24 bottom-10">
            <div class="mx-auto max-w-5xl h-full rounded-[2.75rem]
                        bg-[linear-gradient(to_right,_#fff7ed_0%,_#fff_52%,_#fef3c7_100%)]
                        border border-amber-100/70 shadow-[0_16px_60px_rgba(248,180,75,0.22)]"></div>
        </div>

        <div class="relative max-w-4xl w-full px-4">
            <div class="relative bg-white/95 backdrop-blur-xl border border-amber-100/80
                        rounded-[2.25rem] shadow-[0_18px_60px_rgba(248,180,75,0.32)]
                        overflow-hidden">

                {{-- top accent --}}
                <div class="absolute -top-20 -right-10 w-56 h-56
                            bg-gradient-to-br from-amber-300/45 via-orange-200/0 to-rose-300/45
                            blur-3xl pointer-events-none"></div>

                {{-- header --}}
                <div class="px-8 md:px-12 pt-7 pb-4 flex flex-col md:flex-row md:items-center md:justify-between gap-5 border-b border-amber-100/80">
                    <div class="flex items-start gap-4">
                        <div class="relative">
                            <div class="w-14 h-14 rounded-2xl
                                        bg-gradient-to-br from-amber-300 via-orange-400 to-rose-400
                                        flex items-center justify-center
                                        shadow-[0_12px_30px_rgba(249,115,22,0.75)]">
                                <i class="fa-solid fa-heart-pulse text-white text-xl"></i>
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-6 h-6 rounded-full bg-emerald-400/90 border-2 border-white flex items-center justify-center">
                                <span class="block w-1.5 h-1.5 rounded-full bg-white"></span>
                            </div>
                        </div>
                        <div class="text-left">
                            <h1 class="text-2xl md:text-3xl font-extrabold
                                       bg-gradient-to-r from-amber-700 via-orange-600 to-rose-500
                                       bg-clip-text text-transparent">
                                Your Assessment Results
                            </h1>
                            <p class="text-sm text-amber-900/80 mt-1">
                                A gentle summary of how you are doing emotionally right now, based on your recent answers.
                            </p>

                            {{-- tiny meta --}}
                            <div class="mt-3 flex flex-wrap items-center gap-2 text-[11px] text-amber-900/80">
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-amber-50 border border-amber-100">
                                    <i class="fa-regular fa-clock text-[10px]"></i>
                                    Completed just now
                                </span>
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-orange-50 border border-orange-100">
                                    <i class="fa-solid fa-shield-heart text-[10px]"></i>
                                    Your responses stay private
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- severity pill + legend --}}
                    <div class="flex flex-col items-end gap-2">
                        <div class="inline-flex items-center gap-2 px-3.5 py-2 rounded-full text-[11px] font-semibold
                                    bg-amber-50 border border-amber-100 text-amber-900">
                            <span class="flex h-2 w-2 rounded-full
                                         @if($severity === 'minimal') bg-emerald-400
                                         @elseif($severity === 'mild') bg-amber-300
                                         @elseif($severity === 'moderate') bg-orange-400
                                         @elseif($severity === 'severe') bg-red-500
                                         @else bg-red-700 @endif"></span>
                            Overall Level
                            <span class="ml-1 inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px]
                                         {{ $style['bg'] }} {{ $style['text'] }} border border-current/20">
                                {{ $style['label'] }}
                            </span>
                        </div>
                        <p class="text-[10px] text-amber-900/70">
                            Use this as a guide, not a final label or diagnosis.
                        </p>
                    </div>
                </div>

                {{-- tabs --}}
                <div class="px-6 md:px-10 pt-4">
                    <div class="inline-flex bg-amber-50 border border-amber-100 rounded-2xl p-1 text-xs md:text-sm font-medium text-amber-800">
                        <button type="button"
                                data-tab-target="#tab-overview"
                                class="tab-trigger inline-flex items-center gap-2 px-4 py-2 rounded-xl transition-all duration-200
                                       bg-white text-amber-900 shadow-sm">
                            <span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>
                            Overview
                        </button>
                        <button type="button"
                                data-tab-target="#tab-areas"
                                class="tab-trigger inline-flex items-center gap-2 px-4 py-2 rounded-xl transition-all duration-200
                                       text-amber-700/80 hover:text-amber-900 hover:bg-amber-100/70">
                            <span class="h-1.5 w-1.5 rounded-full bg-amber-200"></span>
                            Key Areas
                        </button>
                        <button type="button"
                                data-tab-target="#tab-next"
                                class="tab-trigger inline-flex items-center gap-2 px-4 py-2 rounded-xl transition-all duration-200
                                       text-amber-700/80 hover:text-amber-900 hover:bg-amber-100/70">
                            <span class="h-1.5 w-1.5 rounded-full bg-amber-200"></span>
                            Next Steps
                        </button>
                    </div>
                </div>

                {{-- tab panels --}}
                <div class="px-6 md:px-10 pb-8 pt-6 space-y-6">

                    {{-- Overview tab --}}
                    <div id="tab-overview" class="tab-panel space-y-6">
                        <div class="grid md:grid-cols-[1.4fr,1fr] gap-4">
                            <div class="rounded-2xl border border-amber-100 bg-gradient-to-br from-amber-50 via-orange-50 to-rose-50 p-5">
                                <h3 class="text-base md:text-lg font-semibold text-amber-900 mb-2">
                                    What your result means
                                </h3>
                                <p class="text-sm text-amber-900/80 leading-relaxed">
                                    Thank you for taking the time to complete this assessment. These results highlight patterns in how you have been feeling, thinking, and coping recently.
                                </p>
                                <p class="mt-3 text-xs md:text-sm text-amber-900/80 leading-relaxed">
                                    This is <span class="font-semibold">not a diagnosis</span>. It is a starting point to understand where support might help you feel more balanced and supported.
                                </p>
                            </div>

                            <div class="rounded-2xl bg-white border border-amber-100 p-5 flex flex-col justify-between">
                                <div>
                                    <p class="text-xs text-amber-900/80 leading-relaxed">
                                        Your overall level is shown on the right as a color and label. Lower levels often mean milder distress, while higher levels suggest you may benefit from more focused support.
                                    </p>
                                </div>
                                <div class="mt-4 space-y-2 text-[11px] text-amber-900/80">
                                    <p class="font-semibold">Severity guide</p>
                                    <div class="flex flex-wrap gap-1.5">
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-100">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span> Minimal
                                        </span>
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-amber-50 text-amber-700 border border-amber-100">
                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-300"></span> Mild
                                        </span>
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-orange-50 text-orange-700 border border-orange-100">
                                            <span class="h-1.5 w-1.5 rounded-full bg-orange-400"></span> Moderate
                                        </span>
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-red-50 text-red-700 border border-red-100">
                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span> Severe+
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Key Areas tab --}}
                    <div id="tab-areas" class="tab-panel hidden space-y-4">
                        <div class="flex items-center justify-between flex-wrap gap-3">
                            <h3 class="text-lg font-semibold text-amber-900">
                                Key areas that may need attention
                            </h3>
                            <p class="text-[11px] text-amber-900/75">
                                Highlighted based on which sections scored relatively higher for you.
                            </p>
                        </div>

                        <ul class="space-y-3">
                            @foreach($topIssues as $issue)
                                <li class="flex items-center gap-3 bg-white border border-amber-100 p-4 rounded-2xl">
                                    <div class="w-9 h-9 rounded-xl
                                                bg-gradient-to-br from-amber-300 to-orange-400
                                                text-white flex items-center justify-center shadow-md">
                                        <i class="fa-solid fa-circle-info text-xs"></i>
                                    </div>
                                    <div class="flex-1 flex flex-col">
                                        <span class="capitalize font-semibold text-amber-900">
                                            {{ str_replace('_', ' ', $issue) }}
                                        </span>
                                        <span class="text-[11px] text-amber-900/80 mt-0.5">
                                            This area showed higher concern compared to others, so bringing it up with your therapist can be especially helpful.
                                        </span>
                                    </div>
                                    <span class="hidden md:inline-flex items-center text-[11px] text-amber-800/80 px-2.5 py-1 rounded-full bg-amber-50 border border-amber-100">
                                        Focus area
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Next Steps tab --}}
                    <div id="tab-next" class="tab-panel hidden space-y-5">
                        <div class="grid md:grid-cols-[1.2fr,1fr] gap-4 md:gap-6 items-stretch">
                            {{-- CTA card --}}
                            <div class="rounded-2xl bg-white border border-amber-100 p-5 flex flex-col justify-between">
                                <div class="mb-4">
                                    <h3 class="text-base md:text-lg font-semibold text-amber-900 mb-1">
                                        What you can do next
                                    </h3>
                                    <p class="text-xs md:text-sm text-amber-900/80">
                                        Sharing your results with a professional is one of the most supportive steps you can take. Together, you can decide what kind of care or small changes might help most.
                                    </p>
                                </div>
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <a href="{{ route('therapists.index') }}"
                                       class="flex-1 inline-flex items-center justify-center px-5 py-3 rounded-xl font-semibold text-white text-sm
                                              bg-gradient-to-r from-amber-400 via-orange-400 to-rose-400
                                              shadow-[0_14px_30px_rgba(249,115,22,0.8)]
                                              hover:scale-[1.02] active:scale-[0.99]
                                              transition-all duration-300 ease-out">
                                        Find a Therapist
                                    </a>
                                    <a href="{{ route('assessment.create') }}"
                                       class="flex-1 inline-flex items-center justify-center px-5 py-3 rounded-xl font-semibold text-xs md:text-sm
                                              border border-amber-300/80 text-amber-900
                                              hover:bg-amber-50/80 transition">
                                        Retake Assessment
                                    </a>
                                </div>
                            </div>

                            {{-- Safety / notice card --}}
                            <div class="rounded-2xl bg-rose-50/60 border border-rose-200 p-5">
                                <p class="text-[11px] md:text-xs text-rose-700 mb-2 font-semibold uppercase tracking-wide">
                                    Emotional safety
                                </p>
                                @if($severity === 'critical')
                                    <p class="text-sm md:text-[13px] font-semibold text-rose-800 mb-1">
                                        Immediate support is recommended
                                    </p>
                                    <p class="text-xs md:text-sm text-rose-800/90 leading-relaxed">
                                        If you are feeling unsafe or having thoughts of harming yourself, please contact emergency services or a local mental health helpline right away. You do not have to face this alone.
                                    </p>
                                @else
                                    <p class="text-xs md:text-sm text-rose-800/90 leading-relaxed">
                                        If at any point you feel overwhelmed, unable to cope, or afraid you might hurt yourself,
                                        please reach out to emergency services or a trusted crisis helpline immediately.
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    {{-- simple tab switcher --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const triggers = document.querySelectorAll('.tab-trigger');
            const panels = document.querySelectorAll('.tab-panel');

            function setTab(target) {
                triggers.forEach(t => t.classList.remove('bg-white','text-amber-900','shadow-sm'));
                panels.forEach(panel => panel.classList.add('hidden'));

                const btn = [...triggers].find(t => t.getAttribute('data-tab-target') === target);
                const panel = document.querySelector(target);
                if (btn && panel) {
                    btn.classList.add('bg-white','text-amber-900','shadow-sm');
                    panel.classList.remove('hidden');
                }
            }

            triggers.forEach(btn => {
                btn.addEventListener('click', () => {
                    const target = btn.getAttribute('data-tab-target');
                    setTab(target);
                });
            });

            // default
            setTab('#tab-overview');
        });
    </script>

@endsection
