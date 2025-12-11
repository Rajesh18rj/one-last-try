<nav class="bg-[#fbeac2] fixed w-full top-0 z-30 font-sans">
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

{{--                <li>--}}
{{--                    <a href="/specialties"--}}
{{--                       class="{{ request()->is('specialties') ? $activeClasses : '' }} {{ $linkClasses }}">--}}
{{--                        Specialties--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li>
                    <a href="{{ route('therapists.index') }}"
                       class="{{ request()->is('therapists') ? $activeClasses : '' }} {{ $linkClasses }}">
                        Find a Therapist
                    </a>
                </li>
                <li>
                    <a href="/resources"
                       class="{{ request()->is('resources') ? $activeClasses : '' }} {{ $linkClasses }}">
                        Resources
                    </a>
                </li>
                <li>
                    <a href="/about"
                       class="{{ request()->is('about') ? $activeClasses : '' }} {{ $linkClasses }}">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="/contact"
                       class="{{ request()->is('contact') ? $activeClasses : '' }} {{ $linkClasses }}">
                        Contact Us
                    </a>
                </li>
                <li>
                    <a href="{{ route('login') }}"
                       class="{{ request()->is('login') ? $activeClasses : '' }} {{ $linkClasses }}">
                        Sign In
                    </a>
                </li>
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
        <a href="/specialties" class="text-gray-700 {{ request()->is('specialties') ? 'text-yellow-600' : '' }}">Specialties</a>
        <a href="/therapists" class="text-gray-700 {{ request()->is('therapists') ? 'text-yellow-600' : '' }}">Find a Therapist</a>
        <a href="/resources" class="text-gray-700 {{ request()->is('resources') ? 'text-yellow-600' : '' }}">Resources</a>
        <a href="/about" class="text-gray-700 {{ request()->is('about') ? 'text-yellow-600' : '' }}">About Us</a>
        <a href="/contact" class="text-gray-700 {{ request()->is('contact') ? 'text-yellow-600' : '' }}">Contact Us</a>
        <a href="{{ route('login') }}" class="text-gray-700 {{ request()->is('login') ? 'text-yellow-600' : '' }}">Sign In</a>
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
