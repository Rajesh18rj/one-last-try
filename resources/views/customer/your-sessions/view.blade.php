<div id="viewSessionModal"
     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-md transition">

    <div class="bg-white w-[920px] max-w-[95%] rounded-3xl shadow-[0_20px_60px_rgba(0,0,0,0.15)] relative overflow-hidden animate-fadeUp max-h-[85vh] flex flex-col">        <!-- Header -->
        <!-- Header -->
        <div class="bg-gradient-to-r from-[#fff1f5] via-[#fff7ed] to-[#fdf2f8] p-7 border-b relative">

            <button onclick="closeViewModal()"
                    class="absolute top-6 right-6 w-10 h-10 rounded-xl bg-white shadow hover:bg-red-50 hover:scale-105 transition">

                <i class="fa-solid fa-xmark text-gray-400 hover:text-red-500"></i>

            </button>

            <div>

                <h2 class="text-2xl font-semibold flex items-center gap-3 text-gray-800">

                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-pink-500 to-orange-400 text-white flex items-center justify-center shadow">

                        <i class="fa-solid fa-calendar-check"></i>

                    </div>

                    Session Details

                </h2>

                <p class="text-gray-500 text-sm mt-2">
                    Your therapy session information
                </p>

                <!-- STATUS -->
                <div class="mt-4 flex items-center gap-2">

                    <span class="text-sm text-gray-500 font-medium">
                        Status :
                    </span>

                    <div id="viewStatus"></div>

                </div>

            </div>

        </div>

        <!-- Body -->
        <div class="p-6 space-y-5 overflow-y-auto">
            <!-- Info Grid -->
            <div class="grid grid-cols-2 gap-6">

                <div class="modern-card">

                    <div class="modern-label">

                        <i class="fa-solid fa-user-doctor text-pink-500"></i>

                        Therapist

                    </div>

                    <div id="viewTherapist" class="modern-value"></div>

                </div>


                <div class="modern-card">

                    <div class="modern-label">

                        <i class="fa-solid fa-calendar text-orange-500"></i>

                        Session Date

                    </div>

                    <div id="viewDate" class="modern-value"></div>

                </div>


                <div class="modern-card">

                    <div class="modern-label">

                        <i class="fa-solid fa-clock text-blue-500"></i>

                        Duration

                    </div>

                    <div id="viewDuration" class="modern-value"></div>

                </div>


                <div class="modern-card">

                    <div class="modern-label">

                        <i class="fa-solid fa-indian-rupee-sign text-green-500"></i>

                        Session Fee

                    </div>

                    <div id="viewFee" class="modern-value text-green-600 font-semibold"></div>

                </div>


                <div class="modern-card col-span-2">

                    <div class="modern-label">

                        <i class="fa-solid fa-video text-purple-500"></i>

                        Meeting Link

                    </div>

                    <div id="viewMeeting" class="mt-3"></div>

                </div>

            </div>


            <!-- Notes -->
            <div class="modern-notes">

                <div class="flex items-center gap-2 mb-3 text-gray-700 font-medium">

                    <i class="fa-solid fa-note-sticky text-gray-400"></i>

                    Your Notes

                </div>

                <div id="viewCustomerNotes"
                     class="modern-notes-body">

                </div>

            </div>


        </div>

    </div>

</div>
