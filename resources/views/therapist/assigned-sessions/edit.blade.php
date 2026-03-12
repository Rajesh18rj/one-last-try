<!-- ================= EDIT SESSION MODAL ================= -->
<div id="notesModal"
     class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4">

    <div class="bg-white w-full max-w-2xl rounded-3xl shadow-2xl border border-gray-200 overflow-hidden">

        <!-- HEADER -->
        <div class="bg-gradient-to-r from-pink-50 via-orange-50 to-purple-50 px-7 py-5 border-b">

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-pink-500 to-orange-400 text-white flex items-center justify-center shadow">

                        <i class="fa-solid fa-pen-to-square"></i>

                    </div>

                    <div>

                        <h2 class="text-xl font-semibold text-gray-800">
                            Edit Session
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Update therapist notes and session status
                        </p>

                    </div>

                </div>

                <button onclick="closeNotesModal()"
                        class="w-10 h-10 rounded-xl bg-white shadow hover:bg-red-50 transition flex items-center justify-center">

                    <i class="fa-solid fa-xmark text-gray-400 hover:text-red-500"></i>

                </button>

            </div>

        </div>


        <!-- FORM -->
        <form id="notesForm" method="POST">

            @csrf
            @method('PUT')

            <div class="p-7 space-y-6">

                <!-- SESSION STATUS -->
                <div class="bg-gray-50 rounded-2xl p-5">

                    <label class="text-sm font-semibold text-gray-700 block mb-2">

                        Session Status

                    </label>

                    <select name="session_status"
                            id="sessionStatus"
                            class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition">

                        <option value="not_completed">Not Completed</option>

                        <option value="completed">Completed</option>

                    </select>

                </div>


                <!-- THERAPIST NOTES -->
                <div class="bg-gray-50 rounded-2xl p-5">

                    <label class="text-sm font-semibold text-gray-700 block mb-2">

                        Therapist Notes

                    </label>

                    <textarea name="therapist_notes"
                              id="therapistNotes"
                              rows="6"
                              class="w-full bg-white border border-gray-200 rounded-2xl p-4 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 resize-none transition"
                              placeholder="Write session observations, progress, or important notes...">

</textarea>

                    <div class="text-xs text-gray-400 mt-2">
                        You can update session progress or feedback here
                    </div>

                </div>

            </div>


            <!-- FOOTER -->
            <div class="flex justify-end gap-3 px-7 py-5 border-t bg-gray-50">

                <button type="button"
                        onclick="closeNotesModal()"
                        class="px-6 py-2.5 rounded-xl border border-gray-300 text-gray-600 hover:bg-gray-100 transition">

                    Cancel

                </button>

                <button type="submit"
                        class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-emerald-500 hover:scale-105 text-white px-7 py-2.5 rounded-xl shadow transition">

                    <i class="fa-solid fa-check text-xs"></i>

                    Save Changes

                </button>

            </div>

        </form>

    </div>

</div>
