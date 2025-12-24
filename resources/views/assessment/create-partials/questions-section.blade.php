<div id="tab-questions" class="main-panel hidden space-y-6">

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

                                    <!-- ✅ DONE BADGE -->
                                    <span class="hidden section-badge text-emerald-600 bg-emerald-50 border border-emerald-200 rounded-full px-2 py-[1px] text-[9px]">
                                        Done
                                    </span>

                                    <!-- 🔒 LOCK ICON (hidden by default) -->
                                    <i class="fa-solid fa-lock text-[14px] text-gray-900 opacity-60 hidden lock-icon"></i>
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
                 class="section-panel @if(!$loop->first) hidden @endif
                        bg-white border border-amber-100 rounded-3xl p-5 md:p-6 space-y-4">

                {{-- Header --}}
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-2">
                    <div>
                        <h3 class="text-lg font-semibold text-amber-900">
                            {{ $section['title'] }}
                        </h3>
                        <p class="text-xs text-amber-800/80 mt-1">
                            {{ $section['description'] }}
                        </p>
                    </div>
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full
                                bg-amber-50 border border-amber-200 text-[11px] text-amber-800">
                        <span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>
                        Answer all questions to continue
                    </div>
                </div>

                {{-- Questions --}}
                @foreach($section['questions'] as $qKey => $question)
                    <div class="py-6 border-b last:border-b-0">
                        <p class="text-center text-xl font-semibold text-gray-800 mb-6">
                            {{ $loop->iteration }}. {{ $question }}
                        </p>

                        <div class="flex justify-between max-w-xl mx-auto px-4">
                            @foreach($options as $value => $type)
                                <label class="reaction-label cursor-pointer relative flex flex-col items-center gap-1 sm:gap-2">
                                    <input type="radio"
                                           name="answers[{{ $sectionKey }}][{{ $qKey }}]"
                                           value="{{ $value }}"
                                           required
                                           class="peer absolute opacity-0 pointer-events-none question-input"
                                           data-section="{{ $sectionKey }}"
                                           data-reaction="{{ $type }}">

                                    <svg class="reaction-svg"
                                         data-reaction="{{ $type }}"
                                         viewBox="0 0 24 24"
                                         fill="none"
                                         stroke="currentColor"
                                         stroke-width="1.8"
                                         stroke-linecap="round"
                                         stroke-linejoin="round">

                                        <circle cx="12" cy="12" r="9"/>
                                        <circle class="eye" cx="9" cy="10" r="1"/>
                                        <circle class="eye" cx="15" cy="10" r="1"/>

                                        @if($type === 'very-happy')
                                            <path class="mouth" d="M8 14c1.5 2 6.5 2 8 0"/>
                                        @elseif($type === 'happy')
                                            <path class="mouth" d="M9 14c1 1 5 1 6 0"/>
                                        @elseif($type === 'neutral')
                                            <line class="mouth" x1="9" y1="14" x2="15" y2="14"/>
                                        @elseif($type === 'sad')
                                            <path class="mouth" d="M9 16c1-1 5-1 6 0"/>
                                        @else
                                            <path class="mouth" d="M8 17c2-2 6-2 8 0"/>
                                        @endif
                                    </svg>

                                    <span class="lg:text-[12px] text-[9px] text-gray-400 font-semibold peer-checked:text-amber-700">
                                        {{ $reactionLabels[$type] }}
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                {{-- Submit Section --}}
                <div class="section-submit hidden mt-6 flex justify-center">
                    <button type="button"
                            class="submit-section-btn px-7 py-3 rounded-xl
                                   bg-gradient-to-r from-emerald-500 to-teal-500
                                   text-white text-sm font-semibold shadow-md">
                        Submit
                        <i class="fa-solid fa-paper-plane text-xs ml-1"></i>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    {{-- 🌌 SECTION RESULT MODAL --}}
    <div id="sectionResultModal"
         class="fixed inset-0 z-[9999] hidden items-end pb-14 justify-center
                bg-black/40 backdrop-blur-sm">

        <!-- 🌌 Animated Backdrop -->
        <div class="modal-backdrop pointer-events-none absolute inset-0 overflow-hidden">
            <div class="fog fog-1"></div>
            <div class="fog fog-2"></div>
            <div class="orb orb-1"></div>
            <div class="orb orb-2"></div>
        </div>

        <!-- Card -->
        <div class="relative max-w-xl w-full mx-4 rounded-[3rem]
                    bg-gradient-to-r from-pink-100 via-sky-100 to-violet-100
                    border border-white/70 shadow-[0_30px_80px_rgba(168,85,247,0.45)]
                    p-8 overflow-hidden modal-card">

            <!-- Static glow -->
            <div class="pointer-events-none absolute -top-24 -left-24
                        w-80 h-80 bg-pink-400/30 blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-24 -right-24
                        w-96 h-96 bg-indigo-400/30 blur-3xl"></div>

            <div class="relative flex items-center gap-6">
                <div class="icon-badge w-16 h-16 rounded-3xl flex items-center justify-center">
                    <i class="result-icon fa-solid text-white text-xl"></i>
                </div>

                <div class="flex-1">
                    <p class="modal-title text-2xl font-extrabold"></p>
                    <p class="modal-message mt-1 text-base text-slate-700"></p>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" id="closeResultModal"
                        class="px-4 py-2 text-sm font-semibold rounded-xl bg-white border">
                    Close
                </button>

                <button type="button" id="modalNextSection"
                        class="px-5 py-2 rounded-xl bg-gradient-to-r from-sky-500 to-indigo-600
                               text-white text-sm font-semibold">
                    Next Section
                    <i class="fa-solid fa-arrow-right text-xs ml-1"></i>
                </button>
            </div>
        </div>
    </div>
</div>
