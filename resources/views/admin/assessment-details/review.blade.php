<div id="reviewModal"
     class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4">

    <!-- Modal Card -->
    <div class="bg-white rounded-3xl w-full max-w-md shadow-[0_20px_60px_rgba(0,0,0,0.25)] overflow-hidden">

        <!-- Header -->
        <div class="flex items-center gap-4 px-6 py-5 border-b bg-gradient-to-r from-indigo-50 to-white">
            <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center">
                <i class="fa-solid fa-clipboard-check text-lg"></i>
            </div>

            <div>
                <h2 class="text-lg font-semibold text-gray-800">Review Assessment</h2>
                <p class="text-xs text-gray-500">Update therapist review status</p>
            </div>
        </div>

        <!-- Body -->
        <form id="reviewForm" class="p-6">

            <input type="hidden" id="reviewAssessmentId">

            <div class="space-y-4">

                <!-- Not Yet -->
                <label class="review-option group flex items-center justify-between p-4 rounded-2xl border border-amber-200 bg-amber-50 cursor-pointer transition-all hover:shadow-md hover:-translate-y-[2px]">

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center">
                            <i class="fa-solid fa-hourglass-half"></i>
                        </div>

                        <div>
                            <p class="font-semibold text-gray-800">Not Yet Reviewed</p>
                            <p class="text-xs text-gray-500">Therapist has not checked the report</p>
                        </div>
                    </div>

                    <input type="radio" name="is_reviewed" value="not_yet"
                           class="w-5 h-5 accent-amber-500">
                </label>

                <!-- Reviewed -->
                <label class="review-option group flex items-center justify-between p-4 rounded-2xl border border-emerald-200 bg-emerald-50 cursor-pointer transition-all hover:shadow-md hover:-translate-y-[2px]">

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">
                            <i class="fa-solid fa-check"></i>
                        </div>

                        <div>
                            <p class="font-semibold text-gray-800">Reviewed</p>
                            <p class="text-xs text-gray-500">Therapist verified and analyzed report</p>
                        </div>
                    </div>

                    <input type="radio" name="is_reviewed" value="reviewed"
                           class="w-5 h-5 accent-emerald-500">
                </label>

            </div>

            <!-- Footer -->
            <div class="flex justify-end gap-3 mt-8 pt-5 border-t">

                <button type="button"
                        onclick="closeReviewModal()"
                        class="px-5 py-2.5 rounded-xl font-medium bg-gray-700 text-gray-100 hover:bg-gray-800 transition">
                    Cancel
                </button>

                <button type="submit"
                        class="px-5 py-2.5 rounded-xl font-semibold text-white
                               bg-gradient-to-r from-green-400 to-green-500
                               hover:from-green-700 hover:to-green-800
                               shadow-lg shadow-indigo-200 transition">
                    Save Changes
                </button>

            </div>

        </form>
    </div>
</div>
