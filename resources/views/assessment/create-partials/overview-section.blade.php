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
