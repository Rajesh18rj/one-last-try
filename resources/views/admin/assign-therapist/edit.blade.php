<!-- ================= EDIT MODAL ================= -->
<div id="editModal"
     class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-50 overflow-y-auto">

    <div class="bg-white w-full max-w-5xl rounded-3xl shadow-2xl relative max-h-[90vh] flex flex-col mx-auto mt-10">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-8 py-5 border-b bg-gradient-to-r from-pink-50 to-white rounded-t-3xl">

            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center shadow">
                    <i class="fa-solid fa-pen text-xl"></i>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800">
                        Edit Session
                    </h2>
                    <p class="text-sm text-gray-500">
                        Update session administrative details
                    </p>
                </div>
            </div>

            <button onclick="closeEditModal()"
                    class="w-10 h-10 rounded-xl hover:bg-gray-100 flex items-center justify-center text-gray-500">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>

        <!-- NOTE BAR -->
        <div class="px-8 py-3 bg-indigo-50 border-b border-indigo-200 text-sm text-indigo-800 flex items-center gap-3">
            <i class="fa-solid fa-circle-info text-indigo-600 text-base"></i>
            <span>
        <strong>Note:</strong> You can only edit session fee, status, and meeting link.
    </span>
        </div>

        <!-- FORM -->
        <form id="editForm" method="POST"
              class="flex-1 overflow-y-auto p-8 space-y-0">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <!-- LEFT : PEOPLE (READ ONLY) -->
                <div class="bg-pink-50 rounded-2xl p-6 space-y-6">

                    <h3 class="text-sm font-bold text-gray-500 uppercase">
                        People Information
                    </h3>

                    <!-- Customer -->
                    <div>
                        <label class="text-sm font-semibold mb-2 block">
                            <i class="fa-solid fa-user text-pink-500 mr-1"></i>
                            Customer
                        </label>

                        <input type="text" id="editCustomer"
                               class="w-full border border-gray-200 rounded-xl p-3 bg-gray-100 text-gray-700"
                               readonly>
                    </div>

                    <!-- Therapist -->
                    <div>
                        <label class="text-sm font-semibold mb-2 block">
                            <i class="fa-solid fa-user-doctor text-pink-500 mr-1"></i>
                            Therapist
                        </label>

                        <input type="text" id="editTherapist"
                               class="w-full border border-gray-200 rounded-xl p-3 bg-gray-100 text-gray-700"
                               readonly>
                    </div>

                </div>


                <!-- RIGHT : SESSION -->
                <div class="bg-pink-50 rounded-2xl p-6 space-y-6">

                    <h3 class="text-sm font-bold text-gray-500 uppercase">
                        Session Details
                    </h3>

                    <!-- Scheduled -->
                    <div>
                        <label class="text-sm font-semibold mb-2 block">
                            <i class="fa-solid fa-calendar text-pink-500 mr-1"></i>
                            Scheduled At
                        </label>

                        <input type="text" id="editScheduled"
                               class="w-full border border-gray-200 rounded-xl p-3 bg-gray-100 text-gray-700"
                               readonly>
                    </div>

                    <!-- Fee -->
                    <div>
                        <label class="text-sm font-semibold mb-2 block">
                            <i class="fa-solid fa-indian-rupee-sign text-pink-500 mr-1"></i>
                            Session Fee
                        </label>

                        <input type="number" step="0.01" name="fee" id="editFee"
                               class="w-full border border-gray-200 rounded-xl p-3 focus:ring-2 focus:ring-amber-400">
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="text-sm font-semibold mb-2 block">
                            <i class="fa-solid fa-circle-info text-pink-500 mr-1"></i>
                            Status
                        </label>

                        <select name="status" id="editStatus"
                                class="w-full border border-gray-200 rounded-xl p-3 focus:ring-2 focus:ring-amber-400">
                            <option value="pending">Pending</option>
                            <option value="booked">Booked</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                            <option value="rescheduled">Rescheduled</option>
                            <option value="no_show">No Show</option>
                        </select>
                    </div>

                </div>
            </div>

            <!-- Meeting Link -->
            <div>
                <label class="text-sm font-semibold mt-6 mb-2 block">
                    <i class="fa-solid fa-video text-pink-500 mr-1"></i>
                    Meeting Link
                </label>

                <input type="url" name="meeting_link" id="editMeeting"
                       placeholder="https://meet.google.com/..."
                       class="w-full border bg-pink-50 border-gray-200 rounded-xl p-3 focus:ring-2 focus:ring-amber-400 placeholder:text-gray-400">
            </div>

            <!-- FOOTER -->
            <div class="flex justify-end pt-6 border-t">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-10 py-3 rounded-xl font-semibold shadow-lg">
                    <i class="fa-solid fa-check mr-2"></i>
                    Update Session
                </button>
            </div>

        </form>
    </div>
</div>
