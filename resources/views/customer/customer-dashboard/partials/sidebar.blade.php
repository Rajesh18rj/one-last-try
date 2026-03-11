@php
    $activeClass = 'bg-gradient-to-r from-[#F79C23] to-[#FFB703] text-white shadow-md relative';
    $inactiveClass = 'text-gray-700 hover:bg-[#FFE2A8] transition';
@endphp

<aside id="sidebar"
       class="w-72 transition-all duration-300
          bg-gradient-to-b from-[#FFF3D6] to-[#FFFAF0]
          border-r border-[#FFE2A8] shadow-lg flex flex-col relative">

    <!-- ===== LOGO / TOGGLE AREA ===== -->
    <div class="h-20 flex items-center justify-between px-4
            border-b border-[#FFE2A8]
            bg-white/40 backdrop-blur">

        <img id="sidebarLogo"
             src="{{ asset('images/logo.png') }}"
             alt="OneLastTry"
             class="h-14 object-contain transition-all duration-300 pl-2">

        <button onclick="toggleSidebar()"
                class="w-9 h-9 rounded-lg bg-[#F79C23]
                   text-white flex items-center justify-center
                   shadow hover:bg-[#e68c1f] transition">
            <i id="toggleIcon" class="fa-solid fa-list"></i>
        </button>
    </div>

    <!-- ===== MENU ===== -->
    <nav class="flex-1 px-4 py-6 space-y-3 text-sm">

        <!-- DASHBOARD -->
        <a href="{{ route('customer.dashboard') }}"
           class="group flex items-center gap-3 px-4 py-3 rounded-xl
   {{ request()->routeIs('customer.dashboard') ? $activeClass : $inactiveClass }}">

            @if(request()->routeIs('customer.dashboard'))
                <span class="absolute left-0 top-1/2 -translate-y-1/2
                     w-1 h-6 bg-white rounded-r"></span>
            @endif

            <i class="fa-solid fa-gauge min-w-[20px] text-[20px]
       {{ request()->routeIs('customer.dashboard') ? 'text-white' : 'text-[#F79C23]' }}">
            </i>

            <span class="menu-text ml-0.5 font-semibold">Dashboard</span>
        </a>


    </nav>

    <!-- ===== FOOTER ===== -->
    <div id="footer"
         class="px-2 py-4 border-t border-[#FFE2A8]
            bg-gradient-to-r from-white/70 to-[#FFF3D6]/60
            backdrop-blur text-center">

        <p class="text-xs tracking-wide text-gray-500 flex items-center justify-center gap-1">
            <i class="fa-regular fa-copyright text-gray-400"></i>
            2026
            <span class="font-semibold text-[#F79C23]">OneLastTry</span>
            <span class="mx-1 text-gray-300">|</span>
            All Rights Reserved
        </p>

    </div>
</aside>

<!-- ===== JAVASCRIPT ===== -->
<script>
    let collapsed = false;

    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const texts = document.querySelectorAll('.menu-text');
        const logo = document.getElementById('sidebarLogo');
        const icon = document.getElementById('toggleIcon');

        collapsed = !collapsed;

        if (collapsed) {
            sidebar.classList.replace('w-72', 'w-20');
            texts.forEach(t => t.classList.add('hidden'));
            logo.classList.add('hidden');
            footer.classList.add('hidden');   // 👈 hide footer
            icon.className = 'fa-solid fa-list';
        } else {
            sidebar.classList.replace('w-20', 'w-72');
            texts.forEach(t => t.classList.remove('hidden'));
            logo.classList.remove('hidden');
            footer.classList.remove('hidden'); // 👈 show footer
            icon.className = 'fa-solid fa-angle-left';
        }
    }
</script>
