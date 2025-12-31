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
    <nav class="flex-1 px-4 py-6 space-y-6 text-sm">

        <!-- DASHBOARD -->
        <a href="{{ route('admin.dashboard') }}"
           class="group flex items-center gap-3 px-4 py-3 rounded-xl
   {{ request()->routeIs('admin.dashboard') ? $activeClass : $inactiveClass }}">

            @if(request()->routeIs('admin.dashboard'))
                <span class="absolute left-0 top-1/2 -translate-y-1/2
                     w-1 h-6 bg-white rounded-r"></span>
            @endif

            <i class="fa-solid fa-gauge min-w-[20px] text-[20px]
       {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-[#F79C23]' }}">
            </i>

            <span class="menu-text ml-0.5 font-semibold">Dashboard</span>
        </a>


        <!-- MANAGE USERS -->
        <div class="space-y-3">
            <p class="menu-text font-bold text-xs uppercase text-gray-500 px-3 mb-2 tracking-wide">
                Manage Users
            </p>

            <!-- CUSTOMERS -->
            <a href="{{ route('admin.customers.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl
   {{ request()->routeIs('admin.customers.*') ? $activeClass : $inactiveClass }}">

                @if(request()->routeIs('admin.customers.*'))
                    <span class="absolute left-0 top-1/2 -translate-y-1/2
                     w-1 h-6 bg-white rounded-r"></span>
                @endif

                <i class="fa-solid fa-users text-[20px] min-w-[20px]
       {{ request()->routeIs('admin.customers.*') ? 'text-white' : 'text-[#F79C23]' }}">
                </i>

                <span class="menu-text ml-1 font-semibold">Customers</span>
            </a>


            <!-- THERAPISTS -->
            <a href="{{ route('admin.therapists.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl
   {{ request()->routeIs('admin.therapists.*') ? $activeClass : $inactiveClass }}">

                @if(request()->routeIs('admin.therapists.*'))
                    <span class="absolute left-0 top-1/2 -translate-y-1/2
                     w-1 h-6 bg-white rounded-r"></span>
                @endif

                <i class="fa-solid fa-user-doctor text-[20px] min-w-[20px]
       {{ request()->routeIs('admin.therapists.*') ? 'text-white' : 'text-[#F79C23]' }}">
                </i>

                <span class="menu-text ml-2 font-semibold">Therapists</span>
            </a>


            <!-- ADMINS -->
            <a href="#"
               class="flex items-center gap-3 px-4 py-3 rounded-xl
               {{ request()->routeIs('admin.admins.*') ? $activeClass : $inactiveClass }}">

                @if(request()->routeIs('admin.admins.*'))
                    <span class="absolute left-0 top-1/2 -translate-y-1/2
                                 w-1 h-6 bg-white rounded-r"></span>
                @endif

                <i class="fa-solid fa-user-shield text-[#F79C23] text-[20px] min-w-[20px]"></i>
                <span class="menu-text ml-1 font-semibold">Admins</span>
            </a>
        </div>
    </nav>

    <!-- ===== FOOTER ===== -->
    <div class="px-6 py-4 border-t border-[#FFE2A8] bg-white/40">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-[#F79C23]
                    flex items-center justify-center
                    text-white font-semibold">
                A
            </div>

            <div class="menu-text">
                <p class="text-sm font-semibold">Admin</p>
                <p class="text-xs text-gray-500">admin@onelasttry.com</p>
            </div>
        </div>
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
            icon.className = 'fa-solid fa-list';
        } else {
            sidebar.classList.replace('w-20', 'w-72');
            texts.forEach(t => t.classList.remove('hidden'));
            logo.classList.remove('hidden');
            icon.className = 'fa-solid fa-angle-left';
        }
    }
</script>
