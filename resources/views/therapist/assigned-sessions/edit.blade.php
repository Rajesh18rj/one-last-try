<!-- ================= EDIT SESSION MODAL ================= -->
<div id="notesModal"
     class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4">

    <div class="bg-white w-full max-w-2xl rounded-2xl shadow-xl border border-gray-200 overflow-hidden">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-6 py-4 border-b">

            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center">
                    <i class="fa-solid fa-pen-to-square"></i>
                </div>

                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        Edit Session
                    </h2>
                    <p class="text-xs text-gray-500">
                        Update therapist notes and session status
                    </p>
                </div>
            </div>

            <button onclick="closeNotesModal()"
                    class="w-9 h-9 rounded-lg hover:bg-pink-50 flex items-center justify-center text-gray-500 hover:text-pink-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>

        </div>


        <!-- FORM -->
        <form id="notesForm" method="POST">

            @csrf
            @method('PUT')

            <div class="p-6 space-y-5">

                <!-- SESSION STATUS -->
                <div>
                    <label class="text-sm font-semibold text-gray-700 block mb-2">
                        Session Status
                    </label>

                    <select name="session_status"
                            id="sessionStatus"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400">

                        <option value="not_completed">Not Completed</option>
                        <option value="completed">Completed</option>

                    </select>
                </div>


                <!-- THERAPIST NOTES -->
                <div>

                    <label class="text-sm font-semibold text-gray-700 block mb-2">
                        Therapist Notes
                    </label>

                    <textarea name="therapist_notes"
                              id="therapistNotes"
                              rows="6"
                              class="w-full border border-gray-200 rounded-xl p-4 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400"
                              placeholder="Write session observations, progress, or important notes..."></textarea>

                </div>

            </div>


            <!-- FOOTER -->
            <div class="flex justify-end gap-3 px-6 py-4 border-t">

                <button type="button"
                        onclick="closeNotesModal()"
                        class="px-5 py-2 rounded-xl border border-gray-300 text-white bg-gray-500 hover:bg-gray-600 transition">
                    Cancel
                </button>

                <button type="submit"
                        class="inline-flex items-center gap-1 bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-xl shadow-sm transition">
                    <i class="fa-solid fa-save text-xs"></i>
                    Save Changes
                </button>

            </div>

        </form>

    </div>

</div>
