<!-- ================= VIEW SESSION MODAL ================= -->
<div id="viewSessionModal"
     class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-50 flex items-center justify-center">

    <div class="bg-white w-full max-w-3xl rounded-2xl shadow-2xl">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-6 py-4 border-b">

            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                    <i class="fa-solid fa-eye"></i>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-gray-800">
                        Session Details
                    </h2>
                    <p class="text-xs text-gray-500">
                        View assigned therapy session
                    </p>
                </div>
            </div>

            <button onclick="closeViewModal()"
                    class="w-9 h-9 rounded-lg hover:bg-gray-100 flex items-center justify-center text-gray-500">
                <i class="fa-solid fa-xmark"></i>
            </button>

        </div>


        <!-- CONTENT -->
        <div class="p-6 grid grid-cols-2 gap-6 text-sm">

            <div>
                <span class="text-gray-500">Customer</span>
                <p id="viewCustomer" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <span class="text-gray-500">Session Date</span>
                <p id="viewDate" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <span class="text-gray-500">Duration</span>
                <p id="viewDuration" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <span class="text-gray-500">Fee</span>
                <p id="viewFee" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <span class="text-gray-500">Status</span>
                <p id="viewStatus" class="font-semibold text-gray-800"></p>
            </div>

            <div>
                <span class="text-gray-500">Meeting Link</span>
                <p id="viewMeeting"></p>
            </div>

        </div>


        <!-- NOTES -->
        <div class="px-6 pb-6">

            <div class="border-t pt-4">

                <span class="text-gray-500 text-sm">Therapist Notes</span>

                <div id="viewNotes"
                     class="mt-2 bg-gray-50 border rounded-xl p-4 text-sm text-gray-700">
                </div>

            </div>

        </div>

    </div>

</div>
