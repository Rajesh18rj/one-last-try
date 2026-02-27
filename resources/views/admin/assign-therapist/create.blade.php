<!-- ================= ASSIGN MODAL ================= -->
<div id="assignModal"
     class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-50 overflow-y-auto">

    <div class="bg-white w-full max-w-5xl rounded-3xl shadow-2xl relative max-h-[90vh] flex flex-col mx-auto mt-10">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-8 py-5 border-b bg-gradient-to-r from-pink-50 to-white rounded-t-3xl">

            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center shadow">
                    <i class="fa-solid fa-handshake text-xl"></i>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800">
                        Assign Therapist
                    </h2>
                    <p class="text-sm text-gray-500">
                        Create the therapy session for the customer
                    </p>
                </div>
            </div>

            <button onclick="closeAssignModal()"
                    class="w-10 h-10 rounded-xl hover:bg-gray-100 flex items-center justify-center text-gray-500">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>

        </div>


        <!-- FORM -->
        <form action="{{ route('admin.assign.therapist.store') }}" method="POST"
              class="flex-1 overflow-y-auto p-8 space-y-0">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <!-- LEFT : PEOPLE -->
                <div class="bg-gray-50 rounded-2xl p-6 space-y-6">

                    <h3 class="text-sm font-bold text-gray-500 uppercase">People Information</h3>

                    <!-- Customer -->
                    <div>
                        <label class="text-sm font-semibold mb-2 block">
                            <i class="fa-solid fa-user text-pink-500 mr-1"></i>
                            Customer
                        </label>
                        <select name="customer_id"
                                class="w-full border border-gray-200 bg-white rounded-xl p-3 focus:ring-2 focus:ring-pink-400">
                            <option value="">Select Customer</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">
                                    {{ $customer->name }} ({{ $customer->email }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Therapist -->
                    <div>
                        <label class="text-sm font-semibold mb-2 block">
                            <i class="fa-solid fa-user-doctor text-pink-500 mr-1"></i>
                            Therapist
                        </label>

                        <select name="therapist_id" id="therapistSelect"
                                class="w-full border border-gray-200 bg-white rounded-xl p-3 focus:ring-2 focus:ring-pink-400">
                            <option value="">Select Therapist</option>
                            @foreach($therapists as $therapist)
                                <option value="{{ $therapist->id }}">
                                    {{ $therapist->name }}
                                </option>
                            @endforeach
                        </select>

                        <!-- AVAILABILITY BOX -->
                        <div id="therapistAvailability"
                             class="hidden mt-5 rounded-2xl border border-indigo-100 bg-gradient-to-br from-indigo-50 to-white p-5 shadow-sm">

                            <!-- Header -->
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-9 h-9 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center">
                                    <i class="fa-solid fa-calendar-check"></i>
                                </div>

                                <div>
                                    <div class="text-sm font-semibold text-indigo-700">
                                        Therapist Availability
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        Schedule & session details
                                    </div>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="space-y-4 text-sm">

                                <!-- Days -->
                                <div>
                                    <div class="text-gray-500 mb-1 flex items-center gap-2">
                                        <i class="fa-solid fa-calendar-days text-indigo-500"></i>
                                        Available Days
                                    </div>
                                    <div id="availableDays"
                                         class="flex flex-wrap gap-2 text-gray-800">
                                        <!-- JS fills -->
                                    </div>
                                </div>

                                <!-- Slots -->
                                <div>
                                    <div class="text-gray-500 mb-1 flex items-center gap-2">
                                        <i class="fa-solid fa-clock text-indigo-500"></i>
                                        Time Slots
                                    </div>
                                    <div id="availableSlots"
                                         class="grid grid-cols-1 gap-3">
                                    </div>
                                </div>

                                <!-- Fee & Mode -->
                                <div class="grid grid-cols-2 gap-3">

                                    <div class="rounded-xl bg-white border p-3">
                                        <div class="text-xs text-gray-500">Session Fee</div>
                                        <div id="availableFee"
                                             class="text-lg font-semibold text-emerald-600">
                                            -
                                        </div>
                                    </div>

                                    <div class="rounded-xl bg-white border p-3">
                                        <div class="text-xs text-gray-500">Mode</div>
                                        <div id="availableMode"
                                             class="text-sm font-semibold text-indigo-600">
                                            -
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>


                <!-- RIGHT : SESSION -->
                <div class="bg-gray-50 rounded-2xl p-6 space-y-6">

                    <h3 class="text-sm font-bold text-gray-500 uppercase">Session Details</h3>

                    <!-- Date -->
                    <div>
                        <label class="text-sm font-semibold mb-2 block">
                            <i class="fa-solid fa-calendar text-pink-500 mr-1"></i>
                            Session Date & Time
                        </label>
                        <div>

                            <input type="date" id="sessionDate"
                                   class="w-full border border-gray-200 rounded-xl p-3 focus:ring-2 focus:ring-pink-400">
                        </div>

                        <!-- TIME SLOT SELECTOR -->
                        <div class="mt-4">
                            <label class="text-sm font-semibold mb-2 block">
                                <i class="fa-solid fa-clock text-pink-500 mr-1"></i>
                                Available Time Slots
                            </label>

                            <div id="timeSlots"
                                 class="grid grid-cols-2 md:grid-cols-3 gap-3 text-sm">
                                <div class="text-gray-400">Select date first</div>
                            </div>
                        </div>

                        <!-- HIDDEN REAL FIELD -->
                        <input type="hidden" name="scheduled_at" id="scheduledAt">
                    </div>

                    <!-- Duration -->
                    <div>
                        <label class="text-sm font-semibold mb-2 block">
                            <i class="fa-solid fa-clock text-pink-500 mr-1"></i>
                            Duration (minutes)
                        </label>
                        <input type="number" name="duration_minutes" value="60"
                               class="w-full border border-gray-200 rounded-xl p-3 focus:ring-2 focus:ring-pink-400">
                    </div>

                    <!-- Fee -->
                    <div>
                        <label class="text-sm font-semibold mb-2 block">
                            <i class="fa-solid fa-indian-rupee-sign text-pink-500 mr-1"></i>
                            Session Fee
                        </label>
                        <input type="number" step="0.01" name="fee"
                               class="w-full border border-gray-200 rounded-xl p-3 focus:ring-2 focus:ring-pink-400">
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="text-sm font-semibold mb-2 block">
                            <i class="fa-solid fa-circle-info text-pink-500 mr-1"></i>
                            Status
                        </label>
                        <select name="status"
                                class="w-full border border-gray-200 rounded-xl p-3 focus:ring-2 focus:ring-pink-400">
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
                <label class="text-sm font-semibold mb-2 block">
                    <i class="fa-solid fa-video text-pink-500 mr-1"></i>
                    Meeting Link
                </label>
                <input type="url" name="meeting_link"
                       placeholder="https://meet.google.com/..."
                       class="w-full border border-gray-200 rounded-xl p-3 focus:ring-2 focus:ring-pink-400">
            </div>

            <!-- FOOTER -->
            <div class="flex justify-end pt-6 border-t">
                <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white px-10 py-3 rounded-xl font-semibold shadow-lg">
                    <i class="fa-solid fa-check mr-2"></i>
                    Assign & Create Session
                </button>
            </div>

        </form>
    </div>
</div>
