<nav class="fixed w-full top-0 z-30 font-sans
            bg-gradient-to-r from-amber-200 via-orange-200 to-rose-200">

<div class="max-w-6xl mx-auto px-4">
        <div class="flex items-center justify-between py-3">
            <!-- Left: Logo -->
            <div class="flex items-center space-x-2">
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="One Last Try Logo" class="h-16 w-auto" />
                </a>
            </div>

            <!-- Desktop menu - Now only lg and up -->
            @php
                $linkClasses = "relative py-1 px-2 text-gray-600 font-semibold text-sm
                    after:absolute after:left-0 after:bottom-0 after:w-full after:h-0.5 after:bg-yellow-600 after:scale-x-0
                    after:transition-transform after:duration-300 after:origin-left
                    transition-colors duration-300
                    hover:text-yellow-700 focus:text-yellow-700 hover:after:scale-x-100";

                $activeClasses = "text-yellow-700 after:scale-x-100";
            @endphp

            <ul class="hidden lg:flex space-x-5 items-center">
                <li>
                    <a href="/"
                       class="{{ request()->is('/') ? $activeClasses : '' }} {{ $linkClasses }}">
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('assessments.index') }}"
                       class="{{ request()->is('assessment*') ? $activeClasses : '' }} {{ $linkClasses }}">
                        Take Assessment
                    </a>
                </li>

{{--                <li>--}}
{{--                    <a href="{{ route('therapists.index') }}"--}}
{{--                       class="{{ request()->is('therapists') ? $activeClasses : '' }} {{ $linkClasses }}">--}}
{{--                        Find a Therapist--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li>
                    <a href="#"
                       class="{{ request()->is('prgrams') ? $activeClasses : '' }} {{ $linkClasses }}">
                        Programs
                    </a>
                </li>

                <li>
                    <a href="#"
                       class="{{ request()->is('about') ? $activeClasses : '' }} {{ $linkClasses }}">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="{{ request()->is('contact') ? $activeClasses : '' }} {{ $linkClasses }}">
                        Contact Us
                    </a>
                </li>

                @auth
                    <li class="relative">
                        <!-- Trigger -->
                        <button id="profileMenuBtn"
                                class="{{ $linkClasses }} flex items-center gap-1">
                            Manage Profile
                            <i class="ml-1 fa-solid fa-chevron-down text-xs"></i>
                        </button>

                        <!-- Dropdown -->
                        <div id="profileMenu"
                             class="hidden absolute right-0 mt-2 w-44 bg-white border border-gray-200
                    rounded-xl shadow-lg overflow-hidden z-50">

                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Dashboard
                                </a>
                            @endif

                            @if(auth()->user()->role === 'therapist')
                                <a href="{{ route('therapist.dashboard') }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Dashboard
                                </a>
                            @endif

                            <!-- Profile -->
                            <a href="{{ route('profile.edit') }}"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Edit Profile
                            </a>

                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}"
                           class="{{ request()->is('login') ? $activeClasses : '' }} {{ $linkClasses }}">
                            Sign In
                        </a>
                    </li>
                @endauth



            </ul>

            <!-- Desktop CTA - Now only lg and up -->
            <a
                href="{{ route('therapist.register') }}"
                class="hidden lg:inline-flex ml-4 px-6 py-2 rounded-full bg-[#f7921e] text-white font-bold shadow hover:bg-[#df7d0e]"
            >
                Join as Therapist &rarr;
            </a>

            <!-- Hamburger button - Now md and up -->
            <button
                id="nav-toggle"
                class="md:inline-flex lg:hidden items-center justify-center p-2 rounded-md text-gray-800 hover:bg-[#f7921e] focus:outline-none"
                aria-expanded="false"
            >
                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
</nav>

<!-- Overlay -->
<div id="menu-overlay"
     class="fixed inset-0 bg-black bg-opacity-30 z-40 transition-opacity duration-300 opacity-0 pointer-events-none"></div>

<!-- Mobile/Tablet menu (drawer) -->
<div id="nav-menu"
     class="fixed top-0 right-0 h-full w-[80vw] max-w-sm bg-white rounded-l-2xl shadow-xl z-50 transform translate-x-full transition-transform duration-300 lg:hidden">
    <div class="flex justify-end items-center p-5">
        <button id="menu-close" class="text-gray-700 text-3xl font-bold focus:outline-none">&times;</button>
    </div>
    <div class="px-8 py-2 flex flex-col space-y-6">
        <a href="/" class="font-semibold text-gray-900 {{ request()->is('/') ? 'text-yellow-600' : '' }}">Home</a>
        <a href="{{ route('assessments.index') }}" class="text-gray-700 {{ request()->is('assessment*') ? 'text-yellow-600' : '' }}">Assessment</a>
        <a href="#" class="text-gray-700 {{ request()->is('programs*') ? 'text-yellow-600' : '' }}">Programs</a>
        {{--        <a href="/therapists" class="text-gray-700 {{ request()->is('therapists') ? 'text-yellow-600' : '' }}">Find a Therapist</a>--}}
        <a href="#" class="text-gray-700 {{ request()->is('about') ? 'text-yellow-600' : '' }}">About Us</a>
        <a href="#" class="text-gray-700 {{ request()->is('contact') ? 'text-yellow-600' : '' }}">Contact Us</a>
        @auth
            <div class="relative">
                <!-- Trigger -->
                <button id="mobileProfileMenuBtn"
                        class="w-full text-left text-gray-700 flex items-center justify-between py-2">
                    Manage Profile
                    <i class="fa-solid fa-chevron-down text-xs"></i>
                </button>

                <!-- Dropdown -->
                <div id="mobileProfileMenu"
                     class="hidden mt-2 bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden">

                    <a href="{{ route('profile.edit') }}"
                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        @else
            <a href="{{ route('login') }}"
               class="block py-2 text-gray-700 {{ request()->is('login') ? 'text-yellow-600' : '' }}">
                Sign In
            </a>
        @endauth
        <a
            href="#"
            class="mt-2 px-6 py-2 rounded-full text-center bg-[#f7921e] text-white font-bold shadow hover:bg-[#df7d0e] transition-colors"
        >
            Join as Therapist &rarr;
        </a>
    </div>
</div>

<script>
    const btn = document.getElementById('nav-toggle');
    const menu = document.getElementById('nav-menu');
    const overlay = document.getElementById('menu-overlay');
    const closeBtn = document.getElementById('menu-close');

    // Open drawer
    if (btn) {
        btn.addEventListener('click', () => {
            menu.classList.remove('translate-x-full');
            overlay.classList.remove('opacity-0', 'pointer-events-none');
            overlay.classList.add('opacity-100');
        });
    }

    // Close drawer
    function closeDrawer() {
        menu.classList.add('translate-x-full');
        overlay.classList.remove('opacity-100');
        overlay.classList.add('opacity-0', 'pointer-events-none');
    }

    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    overlay.addEventListener('click', closeDrawer);
</script>


<!-- Manage Profile--->
<script>
    document.addEventListener("DOMContentLoaded", function () {

        function setupDropdown(btnId, menuId) {
            const btn = document.getElementById(btnId);
            const menu = document.getElementById(menuId);

            if (!btn || !menu) return;

            btn.addEventListener("click", function (e) {
                e.stopPropagation();

                // Close all other dropdowns first
                document.querySelectorAll('[data-dropdown]').forEach(d => {
                    if (d !== menu) d.classList.add('hidden');
                });

                menu.classList.toggle("hidden");
            });

            document.addEventListener("click", function (e) {
                if (!menu.contains(e.target) && !btn.contains(e.target)) {
                    menu.classList.add("hidden");
                }
            });
        }

        // Mark dropdowns
        document.getElementById("profileMenu")?.setAttribute("data-dropdown", "true");
        document.getElementById("mobileProfileMenu")?.setAttribute("data-dropdown", "true");

        // Desktop dropdown
        setupDropdown("profileMenuBtn", "profileMenu");

        // Mobile dropdown
        setupDropdown("mobileProfileMenuBtn", "mobileProfileMenu");
    });
</script>



