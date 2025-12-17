@extends('layouts.guest-new')

@section('content')

    <div class="min-h-[100vh] flex items-center justify-center pt-28 pb-12 relative overflow-hidden
                bg-[radial-gradient(circle_at_top,_#fed7aa55,_#fff7ed),radial-gradient(circle_at_bottom,_#fecaca55,_#fff7ed)]">

        {{-- soft blobs --}}
        <div class="pointer-events-none absolute -top-40 -left-10 w-80 h-80
                    bg-gradient-to-br from-amber-300/60 via-orange-300/40 to-yellow-200/35
                    rounded-full blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-40 -right-0 w-96 h-96
                    bg-gradient-to-tr from-orange-400/40 via-rose-300/35 to-amber-200/35
                    rounded-full blur-3xl"></div>

        {{-- soft container background --}}
        <div class="pointer-events-none absolute inset-x-0 top-32 bottom-10">
            <div class="mx-auto max-w-6xl h-full rounded-[3rem]
                        bg-[linear-gradient(to_right,_#fff7ed_0%,_#fff_52%,_#fef3c7_100%)]
                        border border-amber-100/70 shadow-[0_18px_70px_rgba(248,180,75,0.24)]"></div>
        </div>

        <div class="relative max-w-5xl w-full px-4">
            <div class="bg-white/95 backdrop-blur-xl border border-amber-100/80
                        rounded-[2.5rem] shadow-[0_18px_60px_rgba(248,180,75,0.38)]
                        overflow-hidden">

                {{-- Header --}}
                <div class="px-8 md:px-12 pt-7 pb-4 flex flex-col md:flex-row md:items-center md:justify-between gap-5 border-b border-amber-100/70">
                    <div class="flex items-start gap-4">
                        <div class="relative">
                            <div class="w-14 h-14 rounded-2xl
                                        bg-gradient-to-br from-amber-300 via-orange-400 to-rose-400
                                        flex items-center justify-center
                                        shadow-[0_12px_30px_rgba(249,115,22,0.75)]">
                                <i class="fa-solid fa-brain text-white text-xl"></i>
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-6 h-6 rounded-full bg-emerald-400/90 border-2 border-white flex items-center justify-center">
                                <span class="block w-1.5 h-1.5 rounded-full bg-white"></span>
                            </div>
                        </div>
                        <div>
                            <h2 class="text-2xl md:text-3xl font-extrabold
                                       bg-gradient-to-r from-amber-600 via-orange-500 to-rose-500
                                       bg-clip-text text-transparent">
                                Mental Wellbeing Assessment
                            </h2>
                            <p class="text-xs md:text-sm text-amber-900/80 mt-1">
                                A guided check‑in across different areas of your emotional and mental health.
                            </p>
                            <div class="mt-3 flex flex-wrap items-center gap-2 text-[11px] text-amber-800/80">
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-amber-50 border border-amber-100">
                                    <i class="fa-regular fa-clock text-[10px]"></i>
                                    Takes about 3–5 minutes
                                </span>
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-orange-50 border border-orange-100">
                                    <i class="fa-solid fa-shield-heart text-[10px]"></i>
                                    Your answers stay private
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col items-end gap-2">
                        @if(session('success'))
                            <div class="px-4 py-2 rounded-2xl bg-emerald-50 border border-emerald-200 text-[11px] text-emerald-700 max-w-[220px]">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div id="step-pill"
                             class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-amber-50 border border-amber-100 text-[11px] text-amber-800">
                            <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-amber-400 text-white text-[10px] font-semibold">
                                1
                            </span>
                            <span class="step-label">Step 1 of 3 · Overview</span>
                        </div>
                    </div>
                </div>

                @php
                    $options = [
                        0 => '🟢  Not at all',
                        1 => '🟡  Sometimes',
                        2 => '🟠 Often',
                        3 => '🔴 Almost every day',
                    ];


                    $sections = [
                        'depression' => [
                            'title' => 'Depression & Mood',
                            'description' => 'Low mood, loss of interest, or feeling hopeless.',
                            'questions' => [
                                'q1' => 'I feel little interest or pleasure in doing things.',
                                'q2' => 'I feel down, depressed, or hopeless.',
                                'q3' => 'I have thoughts of harming myself.',
                            ],
                        ],
                        'anxiety' => [
                            'title' => 'Anxiety & Fear',
                            'description' => 'Worry, fear, and feeling on edge.',
                            'questions' => [
                                'q1' => 'I feel nervous, anxious, or on edge.',
                                'q2' => 'I find it hard to stop worrying.',
                                'q3' => 'I feel something bad may happen.',
                            ],
                        ],
                        'stress' => [
                            'title' => 'Stress & Burnout',
                            'description' => 'Pressure, overwhelm, and exhaustion.',
                            'questions' => [
                                'q1' => 'I feel overwhelmed by responsibilities.',
                                'q2' => 'I struggle to relax.',
                                'q3' => 'I feel mentally exhausted.',
                            ],
                        ],
                        'relationships' => [
                            'title' => 'Relationships & Social Life',
                            'description' => 'Connection, conflict, and feeling understood.',
                            'questions' => [
                                'q1' => 'I feel misunderstood by people close to me.',
                                'q2' => 'I struggle to maintain relationships.',
                                'q3' => 'I often feel lonely.',
                            ],
                        ],
                        'self_esteem' => [
                            'title' => 'Self-Esteem & Confidence',
                            'description' => 'Self-worth and belief in your abilities.',
                            'questions' => [
                                'q1' => 'I feel bad about myself.',
                                'q2' => 'I doubt my abilities.',
                                'q3' => 'I feel like a failure.',
                            ],
                        ],
                        'sleep' => [
                            'title' => 'Sleep & Energy',
                            'description' => 'Sleep quality and daily energy.',
                            'questions' => [
                                'q1' => 'I have trouble falling or staying asleep.',
                                'q2' => 'I feel tired even after sleeping.',
                                'q3' => 'My sleep affects my daily life.',
                            ],
                        ],
                    ];
                @endphp

                <form method="POST" action="{{ route('assessment.store') }}" class="space-y-0">
                    @csrf

                    {{-- Top Tabs --}}
                    <div class="px-6 md:px-10 pt-4">
                        <div class="flex flex-col gap-2">
                            <div class="inline-flex bg-amber-50 border border-amber-100 rounded-2xl p-1 text-xs md:text-sm font-medium text-amber-800">
                                <button type="button"
                                        data-tab-target="#tab-overview"
                                        data-step-index="1"
                                        class="main-tab inline-flex items-center gap-2 px-4 py-2 rounded-xl
                                               bg-white text-amber-900 shadow-sm transition-all">
                                    <span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>
                                    Overview
                                </button>
                                <button type="button"
                                        data-tab-target="#tab-questions"
                                        data-step-index="2"
                                        class="main-tab inline-flex items-center gap-2 px-4 py-2 rounded-xl
                                               text-amber-700/80 hover:text-amber-900 hover:bg-amber-100/70 transition-all">
                                    <span class="h-1.5 w-1.5 rounded-full bg-amber-200"></span>
                                    Sections
                                </button>
                                <button type="button"
                                        data-tab-target="#tab-submit"
                                        data-step-index="3"
                                        class="main-tab inline-flex items-center gap-2 px-4 py-2 rounded-xl
                                               text-amber-700/80 hover:text-amber-900 hover:bg-amber-100/70 transition-all">
                                    <span class="h-1.5 w-1.5 rounded-full bg-amber-200"></span>
                                    Submit
                                </button>
                            </div>

                            <p class="text-[11px] text-amber-800/80 flex items-center gap-1.5">
                                <i class="fa-regular fa-circle-question text-[10px] text-amber-500"></i>
                                You can freely switch tabs. After finishing a section, the next one opens automatically.
                            </p>
                        </div>
                    </div>

                    {{-- Panels --}}
                    <div class="px-6 md:px-10 pb-8 pt-6 space-y-6">

                        {{-- Overview --}}
                        <div id="tab-overview" class="main-panel space-y-6">
                            <div class="grid md:grid-cols-[1.4fr,1fr] gap-4">
                                <div class="rounded-2xl border border-amber-100 bg-gradient-to-br from-amber-50 via-orange-50 to-rose-50 p-5">
                                    <h3 class="text-lg font-semibold text-amber-900 mb-2">
                                        How this assessment works
                                    </h3>
                                    <p class="text-sm text-amber-900/80 leading-relaxed">
                                        You will see sections like mood, anxiety, stress, relationships, self-esteem, and sleep.
                                        For each statement, choose how often it has affected you recently.
                                    </p>
                                    <ul class="mt-3 space-y-1.5 text-xs text-amber-900/80">
                                        <li class="flex gap-2">
                                            <span class="mt-[3px] h-1.5 w-1.5 rounded-full bg-amber-400"></span>
                                            Honest answers help us recommend better support.
                                        </li>
                                        <li class="flex gap-2">
                                            <span class="mt-[3px] h-1.5 w-1.5 rounded-full bg-orange-400"></span>
                                            You can move between sections at any time.
                                        </li>
                                    </ul>
                                </div>

                                <div class="rounded-2xl bg-white border border-amber-100 p-5 flex flex-col">
                                    <div>
                                        <p class="text-xs text-amber-900/80 leading-relaxed mb-6">
                                            Your answers are encrypted and kept private. They are only used to help suggest
                                            a therapist or care plan aligned with your needs.
                                        </p>

                                        {{-- Start Assessment Button --}}
                                        <button type="button"
                                                id="start-assessment-btn"
                                                class="w-full py-4 px-6 rounded-2xl font-bold text-lg text-white
                                                       bg-gradient-to-r from-amber-400 via-orange-400 to-rose-400
                                                       shadow-[0_14px_30px_rgba(249,115,22,0.75)]
                                                       hover:shadow-[0_18px_40px_rgba(249,115,22,0.85)]
                                                       hover:scale-[1.02] active:scale-[0.98]
                                                       transition-all duration-300 ease-out
                                                       flex items-center justify-center gap-3">
                                            <i class="fa-solid fa-rocket text-lg"></i>
                                            <span>Start Assessment</span>
                                        </button>

                                        <p class="mt-8 text-[11px] text-amber-800/80 text-center">
                                            When ready, click above to begin answering questions.
                                        </p>
                                    </div>

                                    <div class="mt-6 pt-6 border-t border-amber-100/50">
                                        <div class="h-1.5 w-full bg-amber-100 rounded-full overflow-hidden">
                                            <div class="h-full w-1/3 bg-gradient-to-r from-amber-400 via-orange-400 to-rose-400 rounded-full"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Questions --}}
                        <div id="tab-questions" class="main-panel hidden space-y-5">

                            {{-- section chips --}}
                            <div class="flex gap-2 overflow-x-auto pb-1 scrollbar-thin scrollbar-thumb-amber-300/70 scrollbar-track-transparent section-tabs-wrapper">
                                @foreach($sections as $sectionKey => $section)
                                    <button type="button"
                                            data-section-target="#section-{{ $sectionKey }}"
                                            class="section-tab inline-flex flex-col items-start justify-center gap-1 px-4 py-3 rounded-2xl min-w-[170px]
                                                   bg-white/90 text-xs text-amber-900 border border-amber-100
                                                   hover:border-amber-400 hover:bg-amber-50/80 transition-all
                                                   @if($loop->first) !bg-amber-100/90 !border-amber-400 !text-amber-900 shadow-md @endif">
                                        <span class="text-[11px] uppercase tracking-wide text-amber-400 flex items-center gap-1">
                                            {{ $loop->iteration < 10 ? '0'.$loop->iteration : $loop->iteration }}
                                            <span class="hidden section-badge text-emerald-600 bg-emerald-50 border border-emerald-200 rounded-full px-2 py-[1px] text-[9px]">
                                                Done
                                            </span>
                                        </span>
                                        <span class="font-semibold text-sm">{{ $section['title'] }}</span>
                                        <span class="text-[11px] text-amber-700/80 line-clamp-1">
                                            {{ $section['description'] }}
                                        </span>
                                    </button>
                                @endforeach
                            </div>

                            {{-- section panels --}}
                            <div class="mt-4 space-y-5">
                                @foreach($sections as $sectionKey => $section)
                                    <div id="section-{{ $sectionKey }}"
                                         data-section-key="{{ $sectionKey }}"
                                         data-question-count="{{ count($section['questions']) }}"
                                         class="section-panel @if(!$loop->first) hidden @endif bg-white border border-amber-100 rounded-3xl p-5 md:p-6 space-y-4">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-2">
                                            <div>
                                                <h3 class="text-lg font-semibold text-amber-900">
                                                    {{ $section['title'] }}
                                                </h3>
                                                <p class="text-xs text-amber-800/80 mt-1">
                                                    {{ $section['description'] }}
                                                </p>
                                            </div>
                                            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-amber-50 border border-amber-200 text-[11px] text-amber-800">
                                                <span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>
                                                Once you answer all questions, the next section opens automatically
                                            </div>
                                        </div>

                                        @foreach($section['questions'] as $qKey => $question)
                                            <div class="rounded-2xl bg-amber-50/60 border border-amber-100 p-4 md:p-5 mb-3">
                                                <p class="font-medium text-sm md:text-base text-amber-900 mb-3">
                                                    {{ $question }}
                                                </p>
                                                <div class="grid sm:grid-cols-2 gap-3">
                                                    @foreach($options as $value => $label)
                                                        <label class="flex items-center gap-2 text-sm text-amber-900 cursor-pointer">
                                                            <input type="radio"
                                                                   name="answers[{{ $sectionKey }}][{{ $qKey }}]"
                                                                   value="{{ $value }}"
                                                                   required
                                                                   class="question-input h-4 w-4 rounded-full border-amber-300 text-amber-500 focus:ring-amber-400 bg-white accent-amber-500"
                                                                   data-section="{{ $sectionKey }}">
                                                            <span>{{ $label }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div id="tab-submit" class="main-panel hidden space-y-5">
                            <div class="grid md:grid-cols-[1.4fr,1fr] gap-4">
                                <div class="rounded-2xl border border-amber-100 bg-gradient-to-br from-amber-50 via-orange-50 to-rose-50 p-5">
                                    <h3 class="text-lg font-semibold text-amber-900 mb-2">
                                        Ready to submit?
                                    </h3>
                                    <p class="text-sm text-amber-900/80 leading-relaxed">
                                        Take a quick moment to ensure you have answered each section. You can still switch back
                                        to any tab and adjust your responses before submitting.
                                    </p>
                                    <p class="mt-3 text-xs text-amber-900/80">
                                        This assessment is not a diagnosis. It is a starting point to understand your mental wellbeing
                                        and connect you with the most suitable support.
                                    </p>
                                </div>

                                <div class="rounded-2xl bg-white border border-amber-100 p-5 flex flex-col justify-between">
                                    <div>
                                        <p class="text-[11px] text-amber-900/80 mb-2">
                                            Progress overview
                                        </p>
                                        <div class="space-y-1.5 text-[11px] text-amber-800/85">
                                            <div class="flex items-center justify-between">
                                                <span>Sections completed</span>
                                                <span class="font-semibold" id="sections-completed">0 / {{ count($sections) }}</span>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <span>Completion status</span>
                                                <span class="font-semibold" id="completion-status">In progress</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit"
                                                class="w-full py-3.5 rounded-2xl font-bold text-white text-sm md:text-base
                                                       bg-gradient-to-r from-amber-400 via-orange-400 to-rose-400
                                                       shadow-[0_14px_30px_rgba(249,115,22,0.75)]
                                                       hover:scale-[1.02] active:scale-[0.99]
                                                       transition-all duration-300 ease-out">
                                            Submit Assessment
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Tab + auto-next logic --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const mainTabs = document.querySelectorAll('.main-tab');
            const mainPanels = document.querySelectorAll('.main-panel');
            const sectionTabs = document.querySelectorAll('.section-tab');
            const sectionPanels = document.querySelectorAll('.section-panel');
            const stepPill = document.getElementById('step-pill');
            const stepLabelEl = stepPill?.querySelector('.step-label');
            const sectionsCompletedEl = document.getElementById('sections-completed');
            const completionStatusEl = document.getElementById('completion-status');

            const mainStepLabels = {
                1: 'Step 1 of 3 · Overview',
                2: 'Step 2 of 3 · Sections',
                3: 'Step 3 of 3 · Submit',
            };

            function setMainTab(targetId) {
                mainTabs.forEach(t => t.classList.remove('bg-white','text-amber-900','shadow-sm'));
                mainPanels.forEach(panel => panel.classList.add('hidden'));

                const tab = [...mainTabs].find(t => t.getAttribute('data-tab-target') === targetId);
                const panel = document.querySelector(targetId);
                if (tab && panel) {
                    tab.classList.add('bg-white','text-amber-900','shadow-sm');
                    panel.classList.remove('hidden');

                    const stepIndex = tab.getAttribute('data-step-index');
                    if (stepLabelEl && mainStepLabels[stepIndex]) {
                        stepLabelEl.textContent = mainStepLabels[stepIndex];
                    }
                    const badge = stepPill?.querySelector('span.inline-flex');
                    if (badge && stepIndex) badge.textContent = stepIndex;
                }
            }

            // main tabs click
            mainTabs.forEach(btn => {
                btn.addEventListener('click', () => {
                    const target = btn.getAttribute('data-tab-target');
                    setMainTab(target);
                    if (target === '#tab-questions') {
                        document.querySelector('.section-tabs-wrapper')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });

            // Start button handler
            document.getElementById('start-assessment-btn')?.addEventListener('click', () => {
                setMainTab('#tab-questions');
                document.querySelector('.section-tabs-wrapper')?.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });

            // section tabs click
            function setSectionTab(targetId) {
                sectionTabs.forEach(t => t.classList.remove('!bg-amber-100/90','!border-amber-400','!text-amber-900','shadow-md'));
                sectionPanels.forEach(panel => panel.classList.add('hidden'));

                const tab = [...sectionTabs].find(t => t.getAttribute('data-section-target') === targetId);
                const panel = document.querySelector(targetId);
                if (tab && panel) {
                    tab.classList.add('!bg-amber-100/90','!border-amber-400','!text-amber-900','shadow-md');
                    panel.classList.remove('hidden');
                    panel.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }

            sectionTabs.forEach(btn => {
                btn.addEventListener('click', () => {
                    const target = btn.getAttribute('data-section-target');
                    setSectionTab(target);
                });
            });

            // auto move to next section when all questions answered
            const questionInputs = document.querySelectorAll('.question-input');

            function updateCompletion() {
                let completed = 0;
                sectionPanels.forEach(panel => {
                    const total = parseInt(panel.getAttribute('data-question-count') || '0', 10);
                    const sectionKey = panel.getAttribute('data-section-key');
                    const answered = document.querySelectorAll(
                        `.question-input[data-section="${sectionKey}"]:checked`
                    ).length;

                    const tabBtn = [...sectionTabs].find(t => t.getAttribute('data-section-target') === ('#' + panel.id));
                    const badge = tabBtn?.querySelector('.section-badge');

                    if (answered >= total && total > 0) {
                        completed++;
                        if (badge) badge.classList.remove('hidden');
                    } else {
                        if (badge) badge.classList.add('hidden');
                    }
                });

                if (sectionsCompletedEl) {
                    sectionsCompletedEl.textContent = `${completed} / {{ count($sections) }}`;
                }
                if (completionStatusEl) {
                    completionStatusEl.textContent = completed === {{ count($sections) }} ? 'Ready to submit' : 'In progress';
                }
            }

            questionInputs.forEach(input => {
                input.addEventListener('change', () => {
                    const sectionKey = input.getAttribute('data-section');
                    const panel = document.querySelector(`.section-panel[data-section-key="${sectionKey}"]`);
                    if (!panel) return;

                    const total = parseInt(panel.getAttribute('data-question-count') || '0', 10);
                    const answered = document.querySelectorAll(
                        `.question-input[data-section="${sectionKey}"]:checked`
                    ).length;

                    updateCompletion();

                    if (answered >= total && total > 0) {
                        const currentIndex = [...sectionPanels].indexOf(panel);
                        const isLast = currentIndex === sectionPanels.length - 1;

                        // if last section, go to submit tab
                        if (isLast) {
                            setMainTab('#tab-submit');
                            document.querySelector('#tab-submit')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        } else {
                            // open next section tab
                            const nextPanel = sectionPanels[currentIndex + 1];
                            const nextTarget = '#' + nextPanel.id;
                            setSectionTab(nextTarget);

                            // ensure main tab "Sections" is active
                            setMainTab('#tab-questions');
                        }
                    }
                });
            });

            // initial state
            setMainTab('#tab-overview');
        });
    </script>

@endsection
