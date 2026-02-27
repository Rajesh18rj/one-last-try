<div id="adminEditModal"
     class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden items-center justify-center z-50 p-6">

    <div class="w-full max-w-md
                bg-[#F4F5F7]
                rounded-[30px]
                shadow-[0_30px_80px_rgba(0,0,0,0.25)]
                overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between px-7 pt-7">

            <div class="flex items-center gap-4">

                <!-- Icon -->
                <div class="w-12 h-12 rounded-2xl
                            bg-red-100 text-red-600
                            flex items-center justify-center">
                    <i class="fa-solid fa-user-gear"></i>
                </div>

                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        Change Admin Role
                    </h2>

                    <!-- Accent line -->
                    <div class="w-16 h-1 bg-red-400 rounded-full mt-2"></div>

                    <p class="text-xs text-gray-500 mt-2">
                        Update administrator permissions
                    </p>
                </div>

            </div>

            <!-- Close -->
            <button onclick="closeAdminEditModal()"
                    class="text-gray-400 hover:text-gray-600 text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="px-7 py-7">

            <form id="adminEditForm" method="POST">
                @csrf
                @method('PUT')

                <!-- Floating Input Card -->
                <div class="bg-white rounded-2xl p-5 shadow-sm">

                    <label class="text-sm font-semibold text-gray-600">
                        Select Role
                    </label>

                    <select id="adminEditRole"
                            name="role"
                            class="w-full mt-3 px-4 py-3 rounded-xl
                                   border border-gray-200
                                   bg-gray-50
                                   focus:outline-none
                                   focus:ring-2 focus:ring-red-400
                                   focus:bg-white
                                   transition">

                        <option value="admin">Admin</option>
                        <option value="customer">Customer</option>

                    </select>

                </div>

                <!-- Buttons -->
                <div class="mt-8 flex justify-end gap-4">

                    <!-- Dark Gray Cancel -->
                    <button type="button"
                            onclick="closeAdminEditModal()"
                            class="px-6 py-2.5 rounded-xl
                                   bg-gray-800 text-white
                                   font-medium hover:bg-gray-900 transition">
                        Cancel
                    </button>

                    <!-- Red Primary -->
                    <button type="submit"
                            class="px-6 py-2.5 rounded-xl
                                   bg-red-500 text-white font-semibold
                                   hover:bg-red-600 transition shadow-sm">
                        Update Role
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
