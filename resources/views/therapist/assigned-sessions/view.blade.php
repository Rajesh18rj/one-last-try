<!-- ================= VIEW SESSION MODAL ================= -->

<div id="viewSessionModal"
     class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4">

    <div class="bg-white w-full max-w-3xl rounded-2xl shadow-xl border border-gray-200 overflow-hidden">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-6 py-4 border-b">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center">
                    <i class="fa-solid fa-eye"></i>
                </div>

                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        Session Details
                    </h2>
                    <p class="text-xs text-gray-500">
                        View assigned therapy session
                    </p>
                </div>

            </div>

            <button onclick="closeViewModal()"
                    class="w-9 h-9 rounded-lg hover:bg-pink-50 flex items-center justify-center text-gray-500 hover:text-pink-600 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>

        </div>


        <!-- CONTENT -->
        <div class="p-6 grid grid-cols-2 gap-5 text-sm">


            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <span class="text-gray-500 text-xs">Customer</span>
                <p id="viewCustomer" class="font-semibold text-gray-800 mt-1"></p>
            </div>

            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <span class="text-gray-500 text-xs">Session Date</span>
                <p id="viewDate" class="font-semibold text-gray-800 mt-1"></p>
            </div>

            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <span class="text-gray-500 text-xs">Duration</span>
                <p id="viewDuration" class="font-semibold text-gray-800 mt-1"></p>
            </div>

            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <span class="text-gray-500 text-xs">Fee</span>
                <p id="viewFee" class="font-semibold text-gray-800 mt-1"></p>
            </div>

            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <span class="text-gray-500 text-xs">Status</span>
                <p id="viewStatus" class="font-semibold text-gray-800 mt-1"></p>
            </div>

            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <span class="text-gray-500 text-xs">Meeting Link</span>
                <p id="viewMeeting" class="text-pink-600 font-medium mt-1"></p>
            </div>

            <!-- SESSION STATUS (NEW) -->
            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <span class="text-gray-500 text-xs">Your Session Status</span>
                <p id="viewSessionStatus" class="font-semibold mt-1"></p>
            </div>

        </div>

        <!-- NOTES -->
        <div class="px-6 pb-6">

            <div class="border-t pt-6">

                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">

                    <!-- HEADER -->
                    <div class="flex items-center gap-2 px-4 py-2 bg-gray-50 border-b text-sm font-semibold text-gray-700">
                        <i class="fa-solid fa-note-sticky text-pink-500 text-xs"></i>
                        <span>Therapist Notes</span>
                    </div>

                    <!-- CONTENT -->
                    <div id="viewNotes"
                         class="p-4 text-sm text-gray-700 leading-relaxed">
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
