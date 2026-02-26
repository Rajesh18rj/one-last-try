<div id="editModal"
     class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden items-center justify-center z-50 p-6">

    <div class="w-full max-w-md
                bg-[#F4F5F7]
                rounded-[32px]
                shadow-[0_30px_80px_rgba(0,0,0,0.25)]
                overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between px-8 pt-8">

            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl
                            bg-orange-100 text-orange-500
                            flex items-center justify-center">
                    <i class="fa-solid fa-user-gear"></i>
                </div>

                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Change User Role</h2>
                    <p class="text-sm text-gray-500">
                        This action affects user permissions
                    </p>
                </div>
            </div>

            <button onclick="closeEditModal()"
                    class="text-gray-400 hover:text-gray-600 text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="px-8 py-8">
            <form method="POST" id="editForm">
                @csrf
                @method('PUT')

                <!-- Floating Field Card -->
                <div class="bg-white rounded-2xl p-5 shadow-sm">

                    <label class="text-sm font-semibold text-gray-600">
                        Role
                    </label>

                    <select name="role" id="editRole"
                            class="w-full mt-3 px-4 py-3 rounded-xl
                                   border border-gray-200
                                   bg-gray-50
                                   focus:outline-none
                                   focus:ring-2 focus:ring-orange-400
                                   focus:bg-white
                                   transition">
                        <option value="customer">Customer</option>
                        <option value="admin">Admin</option>
                    </select>

                </div>

                <!-- Buttons -->
                <div class="mt-8 flex justify-end gap-4">

                    <button type="button"
                            onclick="closeEditModal()"
                            class="px-6 py-2.5 rounded-xl
                                   bg-gray-800 text-white
                                   font-medium hover:bg-gray-900 transition">
                        Cancel
                    </button>

                    <!-- IMPORTANT: still button -->
                    <button type="button"
                            onclick="openConfirmModal()"
                            class="px-6 py-2.5 rounded-xl
                                   bg-emerald-500 text-white font-semibold
                                   hover:bg-emerald-600 transition shadow-sm">
                        Update Role
                    </button>

                </div>
            </form>
        </div>

    </div>
</div>
<!-- ================= CONFIRMATION MODAL ================= -->
<div id="confirmModal"
     class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden items-center justify-center z-50 p-6">

    <div class="w-full max-w-sm
                bg-[#F4F5F7]
                rounded-[28px]
                shadow-[0_30px_80px_rgba(0,0,0,0.25)]
                p-7">

        <!-- Header Icon -->
        <div class="flex items-center gap-4 mb-4">

            <div>
                <h3 class="text-lg font-semibold text-gray-800">
                    Confirm Role Change
                </h3>
                <p class="text-xs text-gray-500">
                    Please review before continuing
                </p>
            </div>
        </div>

        <!-- Message -->
        <div class="bg-white rounded-2xl p-4 shadow-sm mb-6">
            <p class="text-sm text-gray-600 leading-relaxed">
                You are about to change this user's role to
                <span class="font-semibold text-red-600" id="confirmRole"></span>.
                This will update their permissions and access.
            </p>
        </div>

        <!-- Buttons -->
        <div class="flex justify-end gap-3">

            <button onclick="closeConfirmModal()"
                    class="px-5 py-2.5 rounded-xl
                           bg-gray-800 text-white font-medium
                           hover:bg-gray-900 transition">
                Cancel
            </button>

            <button onclick="submitRoleChange()"
                    class="px-5 py-2.5 rounded-xl
                           bg-emerald-500 text-white font-semibold
                           hover:bg-emerald-600 transition shadow-sm">
                Yes, Change Role
            </button>

        </div>

    </div>
</div>
