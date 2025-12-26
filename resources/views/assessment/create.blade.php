@extends('layouts.assessment-layout')

@section('content')

    <div class="min-h-[100vh] flex items-center justify-center pt-0 pb-0 relative overflow-hidden
                bg-[radial-gradient(circle_at_top,_#fed7aa55,_#fff7ed),radial-gradient(circle_at_bottom,_#fecaca55,_#fff7ed)]">

        {{-- soft blobs --}}
        <div class="pointer-events-none absolute -top-40 -left-10 w-80 h-80
                    bg-gradient-to-br from-amber-300/60 via-orange-300/40 to-yellow-200/35
                    rounded-full blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-40 -right-0 w-96 h-96
                    bg-gradient-to-tr from-orange-400/40 via-rose-300/35 to-amber-200/35
                    rounded-full blur-3xl"></div>

        {{-- soft container background --}}
{{--        <div class="pointer-events-none absolute inset-x-0 top-32 bottom-10">--}}
{{--            <div class="mx-auto max-w-6xl h-full rounded-[3rem]--}}
{{--                        bg-[linear-gradient(to_right,_#fff7ed_0%,_#fff_52%,_#fef3c7_100%)]--}}
{{--                        border border-amber-100/70 shadow-[0_18px_70px_rgba(248,180,75,0.24)]"></div>--}}
{{--        </div>--}}

        <div class="relative max-w-6xl w-full px-0">
            <div class="bg-white/95 backdrop-blur-xl pb-6 pt-6 border border-amber-100/80
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

                {{-- Options and Questions --}}
                @php
                    /* =========================================================
                     |  5-POINT REACTION EMOJI SCALE
                     |=========================================================*/
                    $options = [
                        4 => 'very-happy',
                        3 => 'happy',
                        2 => 'neutral',
                        1 => 'sad',
                        0 => 'very-sad',
                    ];

                    $reactionLabels = [
                        'very-happy' => 'Strongly Agree',
                        'happy'      => 'Agree',
                        'neutral'    => 'Neutral',
                        'sad'        => 'Disagree',
                        'very-sad'   => 'Strongly Disagree',
                    ];


                    /* =========================================================
                     |  ASSESSMENT SECTIONS – 9 TOPICS, 5 QUESTIONS EACH
                     |=========================================================*/
                    $sections = [

                        'emotional_intelligence' => [
                            'title' => 'Emotional Intelligence',
                            'description' => 'Understanding, managing, and expressing emotions.',
                            'questions' => [
                                'q1' => 'I am aware of my emotions as they occur.',
                                'q2' => 'I can manage my emotions during stress.',
                                'q3' => 'I understand how my emotions affect others.',
                                'q4' => 'I respond calmly in emotional situations.',
                                'q5' => 'I reflect on my emotional reactions.',
                            ],
                        ],

                        'personality' => [
                            'title' => 'Personality Assessment',
                            'description' => 'Behavior patterns, traits, and preferences.',
                            'questions' => [
                                'q1' => 'I adapt easily to change.',
                                'q2' => 'I feel confident expressing my opinions.',
                                'q3' => 'I enjoy social interactions.',
                                'q4' => 'I stay organized in daily activities.',
                                'q5' => 'I remain consistent in my behavior.',
                            ],
                        ],

                        'slumber_score' => [
                            'title' => 'Slumber Score',
                            'description' => 'Sleep quality, restfulness, and energy.',
                            'questions' => [
                                'q1' => 'I fall asleep without difficulty.',
                                'q2' => 'I stay asleep through the night.',
                                'q3' => 'I wake up feeling refreshed.',
                                'q4' => 'I maintain a regular sleep schedule.',
                                'q5' => 'My sleep supports my daily performance.',
                            ],
                        ],

                        'emotional_eating' => [
                            'title' => 'Emotional Eating Behaviour',
                            'description' => 'Eating patterns influenced by emotions.',
                            'questions' => [
                                'q1' => 'I eat when I feel stressed or anxious.',
                                'q2' => 'My mood affects my food choices.',
                                'q3' => 'I snack when I feel bored or lonely.',
                                'q4' => 'I crave food during emotional moments.',
                                'q5' => 'I feel guilty after emotional eating.',
                            ],
                        ],

                        'entrepreneur_employee' => [
                            'title' => 'Entrepreneur or Employee',
                            'description' => 'Mindset, risk tolerance, and work style.',
                            'questions' => [
                                'q1' => 'I enjoy taking initiative.',
                                'q2' => 'I am comfortable taking risks.',
                                'q3' => 'I prefer stability over uncertainty.',
                                'q4' => 'I like making independent decisions.',
                                'q5' => 'I take ownership of outcomes.',
                            ],
                        ],

                        'swot' => [
                            'title' => 'SWOT Analysis',
                            'description' => 'Self-awareness of strengths and weaknesses.',
                            'questions' => [
                                'q1' => 'I clearly understand my strengths.',
                                'q2' => 'I am aware of my weaknesses.',
                                'q3' => 'I look for opportunities to grow.',
                                'q4' => 'I prepare for possible challenges.',
                                'q5' => 'I actively work on self-improvement.',
                            ],
                        ],

                        'interpersonal_skills' => [
                            'title' => 'Interpersonal Skills',
                            'description' => 'Communication, empathy, and relationships.',
                            'questions' => [
                                'q1' => 'I communicate my thoughts clearly.',
                                'q2' => 'I listen carefully to others.',
                                'q3' => 'I respect different viewpoints.',
                                'q4' => 'I manage conflicts calmly.',
                                'q5' => 'I build healthy relationships.',
                            ],
                        ],

                        'emotional_stability' => [
                            'title' => 'Emotional Stability',
                            'description' => 'Emotional balance and stress handling.',
                            'questions' => [
                                'q1' => 'My mood remains stable.',
                                'q2' => 'I recover quickly from emotional setbacks.',
                                'q3' => 'I stay calm under pressure.',
                                'q4' => 'I control emotional impulses.',
                                'q5' => 'I handle difficult situations well.',
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
                    <div class="px-6 md:px-10 pb-2 pt-1 space-y-6">

                        {{-- Overview --}}
                        @include('assessment.create-partials.overview-section')

                        {{-- Questions --}}
                        @include('assessment.create-partials.questions-section')

                        {{-- Submit --}}
                        @include('assessment.create-partials.submit-section')

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

            document
                .querySelector('#section-ikigai .section-submit')
                ?.classList.remove('hidden');


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

                    // ✅ Ikigai is always accessible
                    if (target === '#section-ikigai') {
                        setSectionTab(target);
                        return;
                    }

                    if (btn.classList.contains('section-locked')) return;

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

            // Question Change Handler (Auto-Next Logic)
            questionInputs.forEach(input => {
                input.addEventListener('change', () => {
                    const sectionKey = input.getAttribute('data-section');
                    const panel = document.querySelector(
                        `.section-panel[data-section-key="${sectionKey}"]`
                    );
                    if (!panel) return;

                    const total = parseInt(panel.getAttribute('data-question-count'), 10);
                    const answered = panel.querySelectorAll(
                        `.question-input[data-section="${sectionKey}"]:checked`
                    ).length;

                    // Always hide first (important)
                    // 🔒 Hide submit by default
                    panel.querySelector('.section-submit')?.classList.add('hidden');

                    // ✅ Show submit when all answered
                    if (answered === total) {

                        // ✅ Ikigai: always allow submit
                        if (sectionKey === 'ikigai') {
                            panel.querySelector('.section-submit')?.classList.remove('hidden');
                            return;
                        }

                        // other sections
                        panel.querySelector('.section-submit')?.classList.remove('hidden');
                    }



                    updateCompletion();

                    // Show ONLY when all answered

                });
            });

            // initial state
            setMainTab('#tab-overview');


            function calculateSectionResult(sectionKey) {
                const inputs = document.querySelectorAll(
                    `.question-input[data-section="${sectionKey}"]:checked`
                );

                let total = 0;
                const max = inputs.length * 4;
                inputs.forEach(i => total += parseInt(i.value));

                const percent = Math.round((total / max) * 100);

                if (percent >= 80) {
                    return {
                        title: "Excellent",
                        msg: "Your responses suggest good self-awareness and emotional balance. You seem to handle situations with clarity and calm.",
                        icon: "fa-crown",
                        gradient: "from-pink-500 via-purple-500 to-indigo-500",
                        text: "text-pink-600"
                    };
                } else if (percent >= 60) {
                    return {
                        title: "Good",
                        msg: "Your responses show generally healthy patterns. With continued awareness, this area can grow even stronger.",
                        icon: "fa-thumbs-up",
                        gradient: "from-emerald-500 via-teal-500 to-cyan-500",
                        text: "text-emerald-600"
                    };
                } else if (percent >= 40) {
                    return {
                        title: "Moderate",
                        msg: "Your responses show generally healthy patterns. With continued awareness, this area can grow even stronger.",
                        icon: "fa-chart-line",
                        gradient: "from-sky-500 via-blue-500 to-indigo-500",
                        text: "text-sky-600"
                    };
                } else {
                    return {
                        title: "Needs Attention",
                        msg: "Your responses show some ups and downs, which is normal. Gentle awareness may help bring more balance over time.",
                        icon: "fa-triangle-exclamation",
                        gradient: "from-orange-400 via-rose-400 to-pink-400",
                        text: "text-orange-600"
                    };
                }
            }

            // Submit button → OPEN POPUP
            let activePanel = null;

            document.addEventListener('click', (e) => {
                const btn = e.target.closest('.submit-section-btn');
                if (!btn) return;

                activePanel = btn.closest('.section-panel');
                const sectionKey = activePanel.getAttribute('data-section-key');

                // 🔒 LOCK CURRENT & PREVIOUS SECTIONS
                const panels = [...document.querySelectorAll('.section-panel')];
                const tabs   = [...document.querySelectorAll('.section-tab')];

                const currentIndex = panels.indexOf(activePanel);

                panels.forEach((panel, index) => {
                    if (index <= currentIndex) {
                        panel.classList.add('section-locked');

                        const tab = tabs[index];
                        tab?.classList.add('section-locked');

                        // 🔒 SHOW LOCK ICON
                        const lockIcon = tab?.querySelector('.lock-icon');
                        lockIcon?.classList.remove('hidden');
                    }
                });


                    // 👉 Ikigai: skip modal but go next
                if (sectionKey === 'ikigai') {

                    const panels = [...document.querySelectorAll('.section-panel')];
                    const index = panels.indexOf(activePanel);

                    if (index === panels.length - 1) {
                        setMainTab('#tab-submit');
                    } else {
                        setMainTab('#tab-questions');
                        setSectionTab('#' + panels[index + 1].id);
                    }

                    return;
                }


                const result = calculateSectionResult(sectionKey);

                const modal = document.getElementById('sectionResultModal');

                modal.querySelector('.modal-title').textContent = result.title;
                modal.querySelector('.modal-message').textContent = result.msg;

                const icon = modal.querySelector('.result-icon');
                icon.className = `result-icon fa-solid ${result.icon}`;

                const badge = modal.querySelector('.icon-badge');
                badge.className = `icon-badge w-16 h-16 rounded-3xl
    flex items-center justify-center
    bg-gradient-to-br ${result.gradient}`;

                modal.classList.remove('hidden');
                modal.classList.add('flex');

            });


            const closeBtn = document.getElementById('closeResultModal');
            const nextBtn  = document.getElementById('modalNextSection');

            if (closeBtn) {
                closeBtn.addEventListener('click', () => {
                    const modal = document.getElementById('sectionResultModal');
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    if (!activePanel) return;

                    const modal = document.getElementById('sectionResultModal');
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');

                    const panels = [...document.querySelectorAll('.section-panel')];
                    const index = panels.indexOf(activePanel);

                    if (index === panels.length - 1) {
                        setMainTab('#tab-submit');
                    } else {
                        setMainTab('#tab-questions');
                        setSectionTab('#' + panels[index + 1].id);
                    }
                });
            }

            document.addEventListener('keydown', (e) => {
                if (e.target.closest('.section-locked')) {
                    e.preventDefault();
                }
            });



        });
    </script>

    <style>
        /* ================= BASE ================= */
        .reaction-svg {
            width: 48px;
            height: 48px;
            color: #cbd5e1; /* default gray */
            transition:
                transform 0.25s ease,
                color 0.3s ease,
                filter 0.3s ease;
        }

        /* Hover */
        .reaction-label:hover .reaction-svg {
            transform: scale(1.12);
        }

        /* Transform fix for SVG parts */
        .eye,
        .mouth {
            transform-origin: center;
            transform-box: fill-box;
        }

        /* ================= COLOR STATES ================= */

        /* Very Happy – Green */
        .peer:checked + .reaction-svg[data-reaction="very-happy"] {
            color: #22c55e;
            filter: drop-shadow(0 0 6px rgba(34,197,94,0.6));
        }

        /* Happy – Lime */
        .peer:checked + .reaction-svg[data-reaction="happy"] {
            color: #84cc16;
            filter: drop-shadow(0 0 6px rgba(132,204,22,0.6));
        }

        /* Neutral – Gray */
        .peer:checked + .reaction-svg[data-reaction="neutral"] {
            color: #94a3b8;
        }

        /* Sad – Orange */
        .peer:checked + .reaction-svg[data-reaction="sad"] {
            color: #fb923c;
            filter: drop-shadow(0 0 6px rgba(251,146,60,0.6));
        }

        /* Very Sad – Red */
        .peer:checked + .reaction-svg[data-reaction="very-sad"] {
            color: #ef4444;
            filter: drop-shadow(0 0 6px rgba(239,68,68,0.6));
        }

        /* Scale on select */
        .peer:checked + .reaction-svg {
            transform: scale(1.3);
        }

        /* ================= ANIMATIONS ================= */

        /* Eye blink */
        .peer:checked + .reaction-svg .eye {
            animation: blink 0.35s ease-in-out;
        }

        /* Mouth bounce */
        .peer:checked + .reaction-svg .mouth {
            animation: mouthBounce 0.35s ease-out;
        }

        @keyframes blink {
            0% { transform: scaleY(1); }
            50% { transform: scaleY(0.1); }
            100% { transform: scaleY(1); }
        }

        @keyframes mouthBounce {
            0% { transform: translateY(0); }
            50% { transform: translateY(-1.5px); }
            100% { transform: translateY(0); }
        }

        /* for NEXT BUTTON (PER SECTION) */
        /* Font Awesome sharpness fix */
        .fa-solid {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Smooth entry animation */
        @keyframes glowFloat {
            0% {
                opacity: 0;
                transform: translateY(16px) scale(0.98);
            }
            60% {
                opacity: 1;
                transform: translateY(-2px) scale(1.01);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .section-result {
            animation: glowFloat 0.6s cubic-bezier(.22,1,.36,1);
        }



        /* ================= BACKDROP AMBIENCE (ENHANCED) ================= */

        .modal-backdrop {
            z-index: 0;
        }

        /* Fog layers */
        .fog {
            position: absolute;
            width: 160%;
            height: 160%;
            background: radial-gradient(
                circle,
                rgba(255,255,255,0.35),
                transparent 65%
            );
            filter: blur(90px);
            opacity: 0.6;
            animation: fogMove 35s ease-in-out infinite alternate;
        }

        .fog-1 {
            top: -30%;
            left: -35%;
        }

        .fog-2 {
            bottom: -35%;
            right: -30%;
            animation-delay: -10s;
        }

        @keyframes fogMove {
            from {
                transform: translate(0, 0);
            }
            to {
                transform: translate(160px, -120px);
            }
        }

        /* Floating orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(50px);
            opacity: 0.55;
            animation: orbFloat 14s ease-in-out infinite alternate;
        }

        .orb-1 {
            width: 280px;
            height: 280px;
            background: rgba(168,85,247,0.55);
            top: 12%;
            left: 8%;
        }

        .orb-2 {
            width: 320px;
            height: 320px;
            background: rgba(56,189,248,0.55);
            bottom: 8%;
            right: 12%;
            animation-delay: -7s;
        }

        @keyframes orbFloat {
            from {
                transform: translate(0, 0);
            }
            to {
                transform: translate(-60px, -80px);
            }
        }

        /* Card always above */
        .modal-card {
            position: relative;
            z-index: 10;
        }

        /* ================= MOBILE EMOJI – FINAL CLEAN ================= */
        @media (max-width: 640px) {

            .reaction-row {
                display: flex;
                justify-content: space-between;
                gap: 6px;
            }

            .reaction-label {
                flex: 1;
                min-width: 0;
                text-align: center;
                gap: 6px;
            }

            .reaction-svg {
                width: 34px;
                height: 34px;
                margin: 0 auto;
            }

            .reaction-text {
                font-size: 9px;
                line-height: 1.2;
                margin-top: 4px;
                color: #94a3b8;
                max-width: 52px;
                margin-left: auto;
                margin-right: auto;
                word-break: break-word;
                white-space: normal;
            }

            /* smooth selection */
            .peer:checked + .reaction-svg {
                transform: scale(1.1);
            }

            /* disable hover zoom on mobile */
            .reaction-label:hover .reaction-svg {
                transform: none;
            }
        }

    </style>
@endsection
