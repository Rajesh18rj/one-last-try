<!-- ================= VIEW MODAL ================= -->
<div id="viewModal"
     class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-50 overflow-y-auto">

    <div class="bg-white w-full max-w-5xl rounded-3xl shadow-2xl relative max-h-[90vh] flex flex-col mx-auto mt-10">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-8 py-5 border-b bg-gradient-to-r from-pink-50 to-white rounded-t-3xl">

            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center shadow">
                    <i class="fa-solid fa-eye text-xl"></i>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800">
                        Session Details
                    </h2>
                    <p class="text-sm text-gray-500">
                        View therapy session information
                    </p>
                </div>
            </div>

            <button onclick="closeViewModal()"
                    class="w-10 h-10 rounded-xl hover:bg-gray-100 flex items-center justify-center text-gray-500">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>


        <!-- BODY -->
        <div class="flex-1 overflow-y-auto p-8 space-y-0">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <!-- LEFT : PEOPLE -->
                <div class="bg-pink-50 rounded-2xl p-6 space-y-6">

                    <h3 class="text-sm font-bold text-gray-500 uppercase">
                        People Information
                    </h3>

                    <!-- Customer -->
                    <div>
                        <div class="text-xs text-gray-500 mb-1 flex items-center gap-2">
                            <i class="fa-solid fa-user text-pink-500"></i>
                            Customer
                        </div>

                        <div id="viewCustomer"
                             class="w-full bg-white border border-gray-200 rounded-xl p-3 font-semibold text-gray-800"></div>

                        <div id="viewCustomerEmail"
                             class="text-sm text-gray-500 mt-1"></div>
                    </div>

                    <!-- Therapist -->
                    <div>
                        <div class="text-xs text-gray-500 mb-1 flex items-center gap-2">
                            <i class="fa-solid fa-user-doctor text-pink-500"></i>
                            Therapist
                        </div>

                        <div id="viewTherapist"
                             class="w-full bg-white border border-gray-200 rounded-xl p-3 font-semibold text-gray-800"></div>
                    </div>

                </div>


                <!-- RIGHT : SESSION -->
                <div class="bg-pink-50 rounded-2xl p-6 space-y-6">

                    <h3 class="text-sm font-bold text-gray-500 uppercase">
                        Session Details
                    </h3>

                    <!-- Scheduled -->
                    <div>
                        <div class="text-xs text-gray-500 mb-1 flex items-center gap-2">
                            <i class="fa-solid fa-calendar text-pink-500"></i>
                            Scheduled At
                        </div>

                        <div id="viewScheduled"
                             class="w-full bg-white border border-gray-200 rounded-xl p-3 font-semibold text-gray-800"></div>
                    </div>

                    <!-- Fee -->
                    <div>
                        <div class="text-xs text-gray-500 mb-1 flex items-center gap-2">
                            <i class="fa-solid fa-indian-rupee-sign text-pink-500"></i>
                            Session Fee
                        </div>

                        <div id="viewFee"
                             class="w-full bg-white border border-gray-200 rounded-xl p-3 font-semibold text-emerald-600"></div>
                    </div>

                    <!-- Status -->
                    <div>
                        <div class="text-xs text-gray-500 mb-1 flex items-center gap-2">
                            <i class="fa-solid fa-circle-info text-pink-500"></i>
                            Status
                        </div>

                        <div id="viewStatus"
                             class="w-full bg-white border border-gray-200 rounded-xl p-3"></div>
                    </div>

                </div>
            </div>

            <!-- Meeting Link -->
            <div class="mt-6">
                <div class="text-xs text-gray-500 mb-1 flex items-center gap-2 mt-4">
                    <i class="fa-solid fa-video text-pink-500"></i>
                    Meeting Link
                </div>

                <div class="w-full bg-white border border-gray-200 rounded-xl p-3">
                    <a id="viewMeeting"
                       target="_blank"
                       class="text-pink-600 hover:underline break-all"></a>
                </div>
            </div>

        </div>

        <!-- FOOTER -->
        <div class="flex justify-end px-8 py-6 border-t">
            <button onclick="closeViewModal()"
                    class="bg-gray-600 hover:bg-gray-700 text-white px-8 py-3 rounded-xl font-semibold">
                Close
            </button>
        </div>

    </div>
</div>
