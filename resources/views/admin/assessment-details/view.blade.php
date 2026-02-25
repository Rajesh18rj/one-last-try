<div id="viewModal"
     class="fixed inset-0 bg-black/60 backdrop-blur-sm
            hidden items-center justify-center z-50">

    <div class="bg-white w-full max-w-md rounded-3xl
                shadow-2xl relative overflow-hidden">

        <!-- Header -->
        <div class="px-6 py-5
                    bg-gradient-to-r from-orange-400 to-orange-500
                    text-white">
            <h2 class="text-lg font-semibold tracking-wide">
                Customer Details
            </h2>
            <p class="text-xs text-orange-100 mt-1">
                Read-only profile information
            </p>
        </div>

        <!-- Body -->
        <div class="p-6 space-y-5">

            <!-- Avatar + Name -->
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-full
                            bg-orange-100 text-orange-600
                            flex items-center justify-center
                            text-xl font-bold">
                    <span id="viewAvatar">A</span>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Full Name</p>
                    <p class="font-semibold text-gray-800" id="viewName"></p>
                </div>
            </div>

            <!-- Info Card -->
            <div class="bg-gray-50 rounded-2xl p-4 space-y-3 text-sm">

                <!-- Email -->
                <div class="flex items-center justify-between">
                    <span class="text-gray-500">Email</span>
                    <span class="font-medium text-gray-800" id="viewEmail"></span>
                </div>

                <!-- Phone -->
                <div class="flex items-center justify-between">
                    <span class="text-gray-500">Phone</span>
                    <span class="font-medium text-gray-800" id="viewPhone">—</span>
                </div>

                <!-- Role -->
                <div class="flex items-center justify-between">
                    <span class="text-gray-500">Role</span>
                    <span id="viewRole"
                          class="px-3 py-1 rounded-full
                     bg-orange-100 text-orange-600
                     text-xs font-semibold">
        </span>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <div class="px-6 py-4 bg-gray-50 flex justify-end">
            <button onclick="closeViewModal()"
                    class="px-5 py-2 rounded-xl
                           bg-gray-200 hover:bg-gray-300
                           text-sm font-semibold transition">
                Close
            </button>
        </div>
    </div>
</div>
