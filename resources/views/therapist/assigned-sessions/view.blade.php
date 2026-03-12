<!-- ================= VIEW SESSION MODAL ================= -->

<div id="viewSessionModal"
     class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4">

    <div class="bg-white w-full max-w-4xl rounded-3xl shadow-2xl overflow-hidden max-h-[88vh] flex flex-col">

        <!-- HEADER -->
        <div class="bg-gradient-to-r from-pink-50 via-orange-50 to-purple-50 px-7 py-6 border-b">

            <div class="flex justify-between items-start">

                <div class="flex gap-4">

                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-pink-500 to-orange-400 text-white flex items-center justify-center shadow">

                        <i class="fa-solid fa-calendar-check"></i>

                    </div>

                    <div>

                        <h2 class="text-2xl font-semibold text-gray-800">
                            Session Details
                        </h2>

                        <p class="text-gray-500 text-sm mt-1">
                            Your therapy session information
                        </p>

                        <!-- STATUS -->
                        <div class="mt-3 flex items-center gap-2">

                            <span class="text-sm text-gray-500">
                            Booking Status :
                            </span>

                            <span id="viewStatus"
                                  class="px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">
</span>

                        </div>

                    </div>

                </div>

                <button onclick="closeViewModal()"
                        class="w-10 h-10 rounded-xl bg-white shadow hover:bg-red-50 transition flex items-center justify-center">

                    <i class="fa-solid fa-xmark text-gray-400 hover:text-red-500"></i>

                </button>

            </div>

        </div>


        <!-- SINGLE SCROLL -->
        <div class="overflow-y-auto p-7">

            <!-- INFO GRID -->
            <div class="grid grid-cols-2 gap-6">

                <div class="bg-gray-50 rounded-2xl p-5 shadow-sm">

                    <div class="text-sm text-gray-500 flex items-center gap-2">

                        <i class="fa-solid fa-user text-pink-500 text-xs"></i>

                        Customer

                    </div>

                    <div id="viewCustomer"
                         class="text-lg font-semibold text-gray-800 mt-2">
                    </div>

                </div>


                <div class="bg-gray-50 rounded-2xl p-5 shadow-sm">

                    <div class="text-sm text-gray-500 flex items-center gap-2">

                        <i class="fa-solid fa-calendar text-orange-500 text-xs"></i>

                        Session Date

                    </div>

                    <div id="viewDate"
                         class="text-lg font-semibold text-gray-800 mt-2">
                    </div>

                </div>


                <div class="bg-gray-50 rounded-2xl p-5 shadow-sm">

                    <div class="text-sm text-gray-500 flex items-center gap-2">

                        <i class="fa-solid fa-clock text-blue-500 text-xs"></i>

                        Duration

                    </div>

                    <div id="viewDuration"
                         class="text-lg font-semibold text-gray-800 mt-2">
                    </div>

                </div>


                <div class="bg-gray-50 rounded-2xl p-5 shadow-sm">

                    <div class="text-sm text-gray-500 flex items-center gap-2">

                        <i class="fa-solid fa-indian-rupee-sign text-green-500 text-xs"></i>

                        Session Fee

                    </div>

                    <div id="viewFee"
                         class="text-lg font-semibold text-gray-800 mt-2">
                    </div>

                </div>


                <div class="bg-gray-50 rounded-2xl p-5 shadow-sm">

                    <div class="text-sm text-gray-500">
                        Your Session Status
                    </div>

                    <div id="viewSessionStatus"
                         class="font-semibold mt-2">
                    </div>

                </div>


                <div class="bg-gray-50 rounded-2xl p-5 shadow-sm">

                    <div class="text-sm text-gray-500 flex items-center gap-2">

                        <i class="fa-solid fa-video text-purple-500 text-xs"></i>

                        Meeting Link

                    </div>

                    <div id="viewMeeting"
                         class="font-medium mt-2">
                    </div>

                </div>

            </div>


            <!-- NOTES -->
            <div class="mt-7 bg-gray-50 rounded-2xl p-6">

                <div class="flex items-center gap-2 text-gray-700 font-semibold mb-3">

                    <i class="fa-solid fa-note-sticky text-gray-400"></i>

                    Your Notes

                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-4">

                    <div id="viewNotes"
                         class="text-gray-700 leading-relaxed notes-clamp">
                    </div>

                    <button id="notesToggle"
                            onclick="toggleNotes()"
                            class="hidden text-xs text-pink-600 mt-2 font-semibold hover:underline">

                        See more

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>
