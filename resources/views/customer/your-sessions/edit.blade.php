<div id="editNotesModal"
     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">

    <div class="bg-white w-[520px] max-w-[95%] rounded-3xl shadow-[0_20px_60px_rgba(0,0,0,0.15)] overflow-hidden animate-fadeUp">

        <!-- Header -->
        <div class="bg-gradient-to-r from-orange-50 to-pink-50 px-6 py-5 border-b">

            <div class="flex justify-between items-center">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-orange-500 text-white flex items-center justify-center shadow">

                        <i class="fa-solid fa-note-sticky"></i>

                    </div>

                    <div>

                        <h3 class="text-lg font-semibold text-gray-800">
                            Edit Session Feedback
                        </h3>

                        <p class="text-xs text-gray-500">
                            Update your session feedback
                        </p>

                    </div>

                </div>

                <button onclick="closeEditNotes()"
                        class="w-9 h-9 rounded-lg bg-white shadow hover:bg-red-50 transition">

                    <i class="fa-solid fa-xmark text-gray-400 hover:text-red-500"></i>

                </button>

            </div>

        </div>

        <!-- Body -->
        <div class="p-6">

            <form id="notesForm">

                <input type="hidden" id="sessionId">

                <label class="text-sm text-gray-600 font-medium">
                    Your Feedback
                </label>

                <textarea
                    id="editNotesText"
                    class="w-full border border-gray-200 rounded-2xl p-4 h-36 mt-2 resize-none focus:ring-2 focus:ring-orange-300 focus:border-orange-300 outline-none transition"
                    placeholder="Write your session notes here..."></textarea>

                <div class="flex justify-end gap-3 mt-6">

                    <button type="button"
                            onclick="closeEditNotes()"
                            class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-600 hover:bg-gray-100 transition">

                        Cancel

                    </button>

                    <button type="submit"
                            class="px-6 py-2.5 bg-gradient-to-r from-green-500 to-emerald-500 text-white rounded-xl shadow hover:scale-105 transition">

                        <i class="fa-solid fa-check mr-1"></i>

                        Save Feedback

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
