<div id="mobileMenu"
     class="fixed inset-0 z-50 bg-black/40 hidden lg:hidden">

    <!-- Menu Panel -->
    <div class="w-72 h-full bg-[#FFF8ED] shadow-xl">

        <!-- Menu Header -->
        <div class="h-20 flex items-center justify-between px-5
                        border-b border-[#FFE2A8]
                        bg-[#FFF3D6]">

            <img src="{{ asset('images/logo.png') }}"
                 class="h-14 object-contain">

            <button onclick="closeMobileMenu()"
                    class="text-gray-600 text-xl">
                ✕
            </button>
        </div>

        <!-- Menu Items -->
        <nav class="px-5 py-6 space-y-6 text-sm">

            <!-- Dashboard -->
            <a href="{{ route('therapist.dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl
                          bg-gradient-to-r from-[#F79C23] to-[#FFB703]
                          text-white font-semibold shadow">
                <i class="fa-solid fa-gauge"></i>
                Dashboard
            </a>

            <!-- Assigned Sessions -->
            <a href="{{ route('therapist.sessions.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl
                          bg-gradient-to-r from-[#F79C23] to-[#FFB703]
                          text-white font-semibold shadow">
                <i class="fa-solid fa-calendar-check"></i>
                Assigned Sessions
            </a>

        </nav>
    </div>
</div>

<!-- ================= JS ================= -->
<script>
    function openMobileMenu() {
        document.getElementById('mobileMenu').classList.remove('hidden');
    }

    function closeMobileMenu() {
        document.getElementById('mobileMenu').classList.add('hidden');
    }
</script>
