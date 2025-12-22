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

                    {{-- Header --}}
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

            {{-- Questions --}}
            @foreach($section['questions'] as $qKey => $question)
                    <div class="py-6 border-b last:border-b-0">

                        <!-- Question -->
                        <p class="text-center text-xl font-semibold text-gray-800 mb-6">
                            {{ $loop->iteration }}. {{ $question }}
                        </p>

                        <!-- Reactions -->
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

                <!-- ✅ SECTION RESULT (PER SECTION) -->
                <div class="section-result hidden mt-10 relative overflow-hidden
            rounded-[3rem]
            bg-gradient-to-r from-pink-100 via-sky-100 to-violet-100
            border border-white/70
            shadow-[0_25px_60px_rgba(168,85,247,0.35)]
            p-8">

                    <!-- Background glow -->
                    <div class="absolute -top-24 -left-24 w-80 h-80
                bg-pink-400/30 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-24 -right-24 w-96 h-96
                bg-indigo-400/30 rounded-full blur-3xl"></div>

                    <div class="relative flex items-center gap-6">

                        <!-- 🎯 ICON BADGE -->
                        <div class="icon-badge relative flex-shrink-0 w-16 h-16 rounded-3xl
                    flex items-center justify-center
                    shadow-[0_12px_30px_rgba(0,0,0,0.25)]">

                            <div class="absolute inset-0 rounded-3xl bg-white/20 blur-xl"></div>

                            <i class="result-icon fa-solid fa-star
                      text-white text-xl leading-none relative"></i>
                        </div>

                        <!-- Text -->
                        <div class="flex-1">
                            <p class="section-result-title text-2xl font-extrabold"></p>
                            <p class="section-result-message mt-1 text-base text-slate-700"></p>

                            <div class="mt-4 inline-flex items-center gap-2
                        text-xs font-bold tracking-wide
                        bg-white/80 backdrop-blur
                        border border-purple-200
                        px-4 py-1.5 rounded-full shadow-sm">
                                <i class="fa-solid fa-circle-check text-[11px]"></i>
                                Section completed 🎉
                            </div>
                        </div>
                    </div>
                </div>



                {{-- ✅ NEXT BUTTON (PER SECTION) --}}
                <div class="section-next hidden mt-4 flex justify-end">
                    <button type="button"
                            class="next-section-btn inline-flex items-center gap-2
                   px-5 py-2 rounded-xl
                   bg-gradient-to-r from-sky-500 via-blue-500 to-indigo-600
                   text-white text-sm font-semibold
                   shadow-[0_10px_25px_rgba(59,130,246,0.45)]
                   hover:from-sky-600 hover:via-blue-600 hover:to-indigo-700
                   hover:shadow-[0_14px_30px_rgba(59,130,246,0.6)]
                   transition-all duration-300">
                        Next Section
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </div>

            </div>
        @endforeach
    </div>

</div>
