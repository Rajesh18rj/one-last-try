<!-- ================= NOTES MODAL ================= -->
<div id="notesModal"
     class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-50 flex items-center justify-center">

    <div class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-6 py-4 border-b">

            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center">
                    <i class="fa-solid fa-notes-medical"></i>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-gray-800">
                        Therapist Notes
                    </h2>
                    <p class="text-xs text-gray-500">
                        Add or update session notes
                    </p>
                </div>
            </div>

            <button onclick="closeNotesModal()"
                    class="w-9 h-9 rounded-lg hover:bg-gray-100 flex items-center justify-center text-gray-500">
                <i class="fa-solid fa-xmark"></i>
            </button>

        </div>


        <!-- FORM -->
        <form id="notesForm" method="POST">

            @csrf
            @method('PUT')

            <div class="p-6">

                <label class="text-sm font-semibold block mb-2">
                    Session Notes
                </label>

                <textarea name="therapist_notes"
                          id="therapistNotes"
                          rows="6"
                          class="w-full border border-gray-200 rounded-xl p-4 focus:ring-2 focus:ring-indigo-400"
                          placeholder="Write session observations, progress, or important notes..."></textarea>

            </div>

            <!-- FOOTER -->
            <div class="flex justify-end gap-3 px-6 py-4 border-t">

                <button type="button"
                        onclick="closeNotesModal()"
                        class="px-5 py-2 rounded-xl border border-gray-200 hover:bg-gray-50">
                    Cancel
                </button>

                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-xl shadow">
                    <i class="fa-solid fa-save mr-1"></i>
                    Save Notes
                </button>

            </div>

        </form>

    </div>

</div>
