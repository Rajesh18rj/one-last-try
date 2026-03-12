<!-- VIEW MODAL -->
<div id="viewModal"
     class="modal fixed inset-0 bg-black/60 hidden items-center justify-center z-50 p-6 backdrop-blur-md">

    <div class="bg-[#FFFDF8] rounded-3xl shadow-2xl w-full max-w-6xl h-[92vh] flex flex-col overflow-hidden border border-amber-200">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-8 py-5 border-b border-amber-200
                    bg-gradient-to-r from-amber-100/80 via-orange-50 to-amber-50">

            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-orange-500 to-amber-500
                            text-white flex items-center justify-center shadow-lg">
                    <i class="fa-solid fa-brain text-2xl"></i>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800 tracking-tight">
                        Mental Assessment Report
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Patient: <span id="viewCustomer" class="font-semibold text-gray-700"></span>
                    </p>
                </div>
            </div>

            <button data-modal-close="viewModal"
                    class="w-11 h-11 rounded-xl bg-white hover:bg-red-50 text-gray-500 hover:text-red-500
                           flex items-center justify-center shadow-md transition">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>

        <!-- BODY -->
        <div class="flex-1 overflow-y-auto">

            <!-- USER PROFILE BAR -->
            <div class="px-8 py-6 bg-gradient-to-r from-white to-amber-50 border-b border-amber-100">
                <div class="flex items-center gap-5">

                    <!-- Avatar -->
                    <div id="viewAvatar"
                         class="w-16 h-16 rounded-full bg-orange-100 text-orange-600
                                flex items-center justify-center font-bold text-2xl shadow-inner">
                        A
                    </div>

                    <!-- User Info -->
                    <div class="flex-1">
                        <h3 id="viewCustomerName"
                            class="text-xl font-bold text-gray-800"></h3>

                        <div class="flex flex-wrap gap-6 mt-2 text-sm text-gray-600">
                            <div>
                                <i class="fa-solid fa-envelope text-gray-400 mr-2"></i>
                                <span id="viewCustomerEmail"></span>
                            </div>

                            <div>
                                <i class="fa-solid fa-phone text-gray-400 mr-2"></i>
                                <span id="viewCustomerPhone"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Score Badge -->
                    <div class="text-right">
                        <p class="text-xs text-gray-500 mb-1">Overall Score</p>
                        <div class="flex items-center gap-3">
                            <div id="viewScore"
                                 class="text-5xl font-extrabold text-orange-500"></div>

                            <div id="viewLevelBadge"
                                 class="px-5 py-2 rounded-xl text-sm font-semibold shadow-sm">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- CONTENT -->
            <div class="p-8 space-y-10">

                <!-- ANALYSIS TITLE -->
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-semibold text-gray-800">
                        Psychological Analysis
                    </h3>
                    <span class="text-xs text-gray-400">
                        Areas requiring attention will appear in red
                    </span>
                </div>

                <!-- TOPIC CARDS -->
                <div id="topicsContainer"
                     class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
                </div>

                <!-- IKIGAI SECTION -->
                <div class="bg-gradient-to-br from-white to-purple-50 rounded-2xl shadow-md border border-purple-100 p-7">

                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-11 h-11 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center shadow">
                            <i class="fa-solid fa-lightbulb"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800">
                            Ikigai Personal Reflection
                        </h3>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8 text-sm">

                        <div>
                            <p class="text-gray-500 mb-1">What you love</p>
                            <p id="ikigaiLove" class="font-semibold text-gray-800"></p>
                        </div>

                        <div>
                            <p class="text-gray-500 mb-1">What you're good at</p>
                            <p id="ikigaiSkill" class="font-semibold text-gray-800"></p>
                        </div>

                        <div>
                            <p class="text-gray-500 mb-1">What the world needs</p>
                            <p id="ikigaiNeed" class="font-semibold text-gray-800"></p>
                        </div>

                        <div>
                            <p class="text-gray-500 mb-1">What you can be paid for</p>
                            <p id="ikigaiPaid" class="font-semibold text-gray-800"></p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
