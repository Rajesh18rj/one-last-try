<div id="editModal"
     class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden items-center justify-center z-50 p-4">

    <div class="relative w-full max-w-md">

        <!-- Glow -->
        <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-orange-400/20 via-transparent to-emerald-400/20 blur-2xl opacity-70"></div>

        <div class="relative bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/40 overflow-hidden">

            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-green-100 text-green-500 flex items-center justify-center">
                        <i class="fa-solid fa-user-gear"></i>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Edit Therapist</h2>
                        <p class="text-xs text-gray-500">Update approval and subscription details</p>
                    </div>
                </div>

                <button type="button"
                        onclick="closeEditModal()"
                        class="w-9 h-9 rounded-full flex items-center justify-center bg-gray-100 hover:bg-red-100 text-gray-500 hover:text-red-500 transition">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <form id="editForm" method="POST" class="px-6 py-6">
                @csrf
                @method('PUT')

                <!-- Approval Status -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Approval Status
                    </label>

                    <div class="relative">

                        <!-- Left Icon -->
                        <div class="absolute left-3 top-1/2 -translate-y-1/2 text-orange-500">
                        </div>

                        <select name="approval_status"
                                id="editStatus"
                                class="w-full appearance-none rounded-xl border border-gray-200 bg-white  pr-10 py-3 text-sm shadow-sm focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition">
                            <option value="pending">Pending Review</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>

                        <!-- Dropdown Arrow -->
                        <div class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">
                        </div>
                    </div>
                </div>

                <!-- Subscription Plan -->
                <div class="mb-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Subscription Plan
                    </label>

                    <div class="relative">

                        <!-- Left Icon -->
                        <div class="absolute left-3 top-1/2 -translate-y-1/2 text-emerald-500">
                        </div>

                        <select name="plan_type"
                                id="editPlan"
                                class="w-full appearance-none rounded-xl border border-gray-200 bg-white pr-10 py-3 text-sm shadow-sm focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
                            <option value="trial">Trial Plan</option>
                            <option value="paid">Paid Plan</option>
                        </select>

                        <div class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end mt-8 gap-3 border-t border-gray-100 pt-5">

                    <button type="button"
                            onclick="closeEditModal()"
                            class="px-5 py-2.5 rounded-xl bg-gray-700 hover:bg-gray-800 text-gray-100 text-sm font-medium transition">
                        Cancel
                    </button>

                    <button type="submit"
                            class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-green-500 text-white text-sm font-semibold shadow-lg hover:shadow-emerald-500/40 hover:scale-[1.03] transition">
                        <i class="fa-solid fa-floppy-disk mr-2"></i>
                        Save Changes
                    </button>

                </div>
            </form>

        </div>
    </div>
</div>
