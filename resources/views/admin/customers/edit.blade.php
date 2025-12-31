<div id="editModal"
     class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden items-center justify-center z-50">

    <div class="bg-white rounded-3xl w-full max-w-md shadow-2xl overflow-hidden">

        <!-- Header -->
        <div class="px-6 py-5 bg-gradient-to-r from-orange-400 to-orange-500 text-white">
            <h2 class="text-lg font-semibold">Change User Role</h2>
            <p class="text-xs text-orange-100 mt-1">
                This action affects user permissions
            </p>
        </div>

        <!-- Body -->
        <div class="p-6">
            <form method="POST" id="editForm">
                @csrf
                @method('PUT')

                <div>
                    <label class="text-sm font-semibold">Role</label>
                    <select name="role" id="editRole"
                            class="w-full mt-2 px-4 py-2 rounded-xl
                                   border border-gray-300
                                   focus:ring-2 focus:ring-orange-400">
                        <option value="customer">Customer</option>
                        <option value="admin">Admin</option>
                        <option value="trainee">Trainee</option>
                    </select>
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <button type="button"
                            onclick="closeEditModal()"
                            class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300">
                        Cancel
                    </button>

                    <!-- IMPORTANT: button, not submit -->
                    <button type="button"
                            onclick="openConfirmModal()"
                            class="px-4 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600">
                        Update Role
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ================= CONFIRMATION MODAL ================= -->
<div id="confirmModal"
     class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden items-center justify-center z-50">

    <div class="bg-white rounded-3xl w-full max-w-sm shadow-2xl p-6">

        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-full bg-orange-100
                        flex items-center justify-center text-orange-600">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            <h3 class="text-lg font-semibold">Confirm Role Change</h3>
        </div>

        <p class="text-sm text-gray-600 mb-5">
            Are you sure you want to change this user’s role to
            <span class="font-semibold text-orange-600" id="confirmRole"></span>?
            This may affect their access and permissions.
        </p>

        <div class="flex justify-end gap-3">
            <button onclick="closeConfirmModal()"
                    class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300">
                Cancel
            </button>

            <button onclick="submitRoleChange()"
                    class="px-4 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600">
                Yes, Change Role
            </button>
        </div>
    </div>
</div>
