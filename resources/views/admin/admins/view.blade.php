<div id="adminViewModal"
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
                    <i class="fa-solid fa-user-shield"></i>
                </div>

                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        Admin Details
                    </h2>

                    <!-- small accent line -->
                    <div class="w-16 h-1 bg-red-400 rounded-full mt-2"></div>

                    <p class="text-xs text-gray-500 mt-2">
                        System administrator profile
                    </p>
                </div>

            </div>

            <!-- Close -->
            <button onclick="closeAdminViewModal()"
                    class="text-gray-400 hover:text-gray-600 text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>


        <!-- Body -->
        <div class="px-7 py-7 space-y-5">

            <!-- Name Card -->
            <div class="bg-white rounded-2xl p-5 shadow-sm flex items-center gap-4">

                <div id="adminViewAvatar"
                     class="w-16 h-16 rounded-2xl
                            bg-red-100 text-red-600
                            flex items-center justify-center
                            text-2xl font-bold">
                    A
                </div>

                <div>
                    <p class="text-sm text-gray-500">Full Name</p>
                    <p id="adminViewName"
                       class="font-semibold text-gray-800 text-base"></p>
                </div>

            </div>

            <!-- Email -->
            <div class="bg-white rounded-2xl p-5 shadow-sm">
                <p class="text-sm text-gray-500 mb-1">Email Address</p>
                <p id="adminViewEmail"
                   class="font-medium text-gray-800 text-sm break-all"></p>
            </div>

            <!-- Role -->
            <div class="bg-white rounded-2xl p-5 shadow-sm flex items-center justify-between">
                <p class="text-sm text-gray-500">Role</p>
                <span id="adminViewRole"
                      class="px-3 py-1 rounded-full text-xs font-semibold
                             bg-red-100 text-red-600">
                </span>
            </div>

        </div>

        <!-- Footer -->
        <div class="px-7 pb-7 flex justify-end">

            <!-- Dark gray cancel -->
            <button onclick="closeAdminViewModal()"
                    class="px-6 py-2.5 rounded-xl
                           bg-gray-800 text-white
                           font-medium hover:bg-gray-900 transition">
                Close
            </button>

        </div>

    </div>
</div>
