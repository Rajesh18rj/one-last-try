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
