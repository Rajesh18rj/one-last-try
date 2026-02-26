<div id="viewModal"
     class="fixed inset-0 bg-black/40 backdrop-blur-sm
            hidden items-center justify-center z-50 p-6">

    <div class="w-full max-w-lg
                bg-[#F4F5F7]
                rounded-[32px]
                shadow-[0_30px_80px_rgba(0,0,0,0.25)]
                overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between px-8 pt-8">

            <div class="flex items-center gap-4">

                <!-- Icon -->
                <div class="w-12 h-12 rounded-2xl
                            bg-orange-100 text-orange-500
                            flex items-center justify-center">
                    <i class="fa-solid fa-user"></i>
                </div>

                <div>
                    <h2 class="text-xl font-semibold text-gray-800">
                        Customer Details
                    </h2>
                    <p class="text-sm text-gray-500">
                        Read-only assessment profile
                    </p>
                </div>

            </div>

            <button onclick="closeViewModal()"
                    class="text-gray-400 hover:text-gray-600 text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>

        </div>

        <!-- Body -->
        <div class="px-8 py-8 space-y-6">

            <!-- Name Card -->
            <div class="bg-white rounded-2xl p-5 shadow-sm">

                <div class="flex items-center gap-4">

                    <div class="w-14 h-14 rounded-2xl
                                bg-orange-100 text-orange-500
                                flex items-center justify-center
                                text-xl font-bold">
                        <span id="viewAvatar">A</span>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Full Name</p>
                        <p id="viewName"
                           class="font-semibold text-gray-800 text-base"></p>
                    </div>

                </div>

            </div>

            <!-- Email -->
            <div class="bg-white rounded-2xl p-5 shadow-sm">
                <p class="text-sm text-gray-500 mb-1">Email</p>
                <p id="viewEmail"
                   class="font-medium text-gray-800 text-sm break-all"></p>
            </div>

            <!-- Phone -->
            <div class="bg-white rounded-2xl p-5 shadow-sm">
                <p class="text-sm text-gray-500 mb-1">Phone</p>
                <p id="viewPhone"
                   class="font-medium text-gray-800 text-sm">—</p>
            </div>

            <!-- Role -->
            <div class="bg-white rounded-2xl p-5 shadow-sm flex items-center justify-between">
                <p class="text-sm text-gray-500">Role</p>
                <span id="viewRole"
                      class="px-3 py-1 rounded-full text-xs font-semibold
                             bg-orange-100 text-orange-500">
                </span>
            </div>

        </div>

        <!-- Footer -->
        <div class="flex justify-end gap-4 px-8 pb-8">

            <!-- Dark Gray Cancel -->
            <button onclick="closeViewModal()"
                    class="px-6 py-2.5 rounded-xl
                           bg-gray-800 text-white
                           font-medium
                           hover:bg-gray-900 transition">
                Cancel
            </button>

        </div>

    </div>
</div>
