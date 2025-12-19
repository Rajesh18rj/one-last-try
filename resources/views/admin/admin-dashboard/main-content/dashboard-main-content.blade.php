<main class="flex-1 p-4 md:p-6 lg:p-8 relative overflow-hidden">
    <!-- Animated Particle Background -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-20 w-64 h-64 bg-gradient-to-r from-[#F79C23]/20 to-orange-400/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute top-1/2 right-20 w-48 h-48 bg-gradient-to-b from-orange-400/15 to-[#FFE2A8]/20 rounded-full blur-2xl animate-float delay-1000"></div>
        <div class="absolute bottom-32 left-1/2 w-80 h-80 bg-gradient-to-t from-[#FFF8E8]/30 to-transparent rounded-full blur-3xl animate-pulse delay-2000"></div>
    </div>

    <!-- Welcome Hero Card with Glassmorphism -->
    <div class="relative bg-gradient-to-br from-white/95 via-white/80 to-white/60 backdrop-blur-xl rounded-3xl shadow-3xl border border-white/40 shadow-orange-500/10 p-8 lg:p-12 overflow-hidden group/card">
        <!-- Dynamic Border Glow -->
        <div class="absolute inset-0 bg-gradient-to-r from-[#F79C23]/20 via-transparent to-orange-400/20 rounded-3xl blur-xl opacity-0 group-hover/card:opacity-100 transition-all duration-700"></div>
        <div class="absolute inset-0  rounded-3xl blur opacity-0 group-hover/card:opacity-30 group-hover/card:animate-pulse transition-all duration-1000"></div>

        <!-- Floating Geometric Elements -->
        <div class="absolute top-6 left-6 w-24 h-24 bg-gradient-to-br from-[#FFE2A8]/30 to-transparent rounded-2xl rotate-12 animate-float-slow"></div>
        <div class="absolute bottom-8 right-8 w-20 h-20 border-2 border-[#F79C23]/40 rounded-xl animate-bounce infinite delay-500"></div>

        <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-10 z-10">
            <!-- Enhanced Welcome Content -->
            <div class="flex-1 lg:pr-8">
                <div class="inline-flex items-center gap-3 px-5 py-3 bg-gradient-to-r from-[#F79C23]/15 to-[#FFE2A8]/30 backdrop-blur-sm rounded-2xl border border-[#F79C23]/30 shadow-lg mb-6 group/status hover:scale-105 transition-all duration-300">
                    <div class="relative">
                        <div class="w-3 h-3 bg-gradient-to-r from-[#F79C23] to-orange-400 rounded-full animate-ping"></div>
                        <div class="absolute inset-0 w-3 h-3 bg-gradient-to-r from-emerald-400 to-green-500 rounded-full animate-pulse delay-300"></div>
                    </div>
                    <span class="text-sm font-semibold text-[#F79C23] tracking-wide">Admin Dashboard</span>
                    <div class="w-20 h-1 bg-gradient-to-r from-[#F79C23]/50 to-transparent rounded-full ml-3 origin-left group-hover/status:scale-x-100 scale-x-0 transition-transform duration-500"></div>
                </div>

                <h1 class="mt-4 text-4xl md:text-5xl lg:text-6xl font-black bg-gradient-to-r from-gray-900 via-gray-800 to-gray-700 bg-clip-text text-transparent leading-[0.9] mb-6 tracking-tight">
                    Welcome back,
                    <span class="mt-5    block bg-gradient-to-r from-[#F79C23] via-orange-500/90 to-orange-600 bg-clip-text text-transparent drop-shadow-2xl animate-gradient-x">
                        {{ auth()->user()->name ?? 'Admin' }}
                    </span>
                </h1>

            </div>

            <!-- 3D Hero Illustration with Morphing -->
            <div class="relative lg:w-64 lg:h-64 w-40 h-40 lg:flex hidden items-center justify-center rounded-3xl bg-gradient-to-br from-[#FFF3D6]/90 to-[#FFE2A8]/70 shadow-3xl border-4 border-white/60 backdrop-blur-xl group/hero">
                <!-- Morphing Ring -->
                <div class="absolute inset-0 bg-gradient-to-r from-[#F79C23]/30 via-orange-400/20 to-[#F79C23]/30 rounded-3xl animate-spin-slow opacity-70 blur-sm"></div>
                <!-- Pulsing Core -->
                <div class="absolute w-32 h-32 bg-gradient-to-br from-[#F79C23] to-orange-500 rounded-3xl shadow-2xl animate-pulse group-hover/hero:scale-110 transition-all duration-500"></div>
                <!-- Icon with Glass Effect -->
                <i class="fa-solid fa-user-shield text-5xl lg:text-7xl text-white relative z-20 drop-shadow-2xl animate-bounce-smooth filter blur-[0.5px]"></i>
                <!-- Floating Stats Badges -->
                <div class="absolute -top-4 -right-4 bg-emerald-400/90 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg animate-float">ACCESS</div>
                <div class="absolute -bottom-4 -left-4 bg-[#F79C23]/90 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg rotate-12 animate-pulse delay-1000">ADMIN</div>
            </div>
        </div>
    </div>

    <!-- Advanced Stats Grid with Micro-Interactions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-16 relative z-10">

        <!-- Total Users - Enhanced -->
        <div class="group relative bg-gradient-to-b from-white/90 to-white/60 backdrop-blur-xl rounded-3xl p-8 border border-white/50 shadow-2xl hover:shadow-orange-500/20 hover:shadow-3xl hover:-translate-y-4 transition-all duration-700 overflow-hidden transform-gpu">
            <!-- Shimmer Gradient -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#F79C23]/10 via-transparent to-orange-400/10 opacity-0 group-hover:opacity-100 transition-all duration-1000"></div>
            <!-- Progress Ring -->
            <svg class="absolute -top-6 -right-6 w-24 h-24 opacity-20">
                <circle cx="38" cy="38" r="32" stroke="#F79C23" stroke-width="4" fill="none" stroke-dasharray="200" stroke-dashoffset="50" class="animate-dash group-hover:stroke-orange-400 transition-colors"/>
            </svg>

            <div class="relative flex items-start gap-6">
                <!-- Icon with 3D Effect -->
                <div class="relative w-20 h-20 rounded-2xl bg-gradient-to-br from-[#FFF3D6] to-[#FFE2A8]/60 flex items-center justify-center shadow-2xl group-hover:scale-125 transition-all duration-500 backdrop-blur-sm border-2 border-white/60">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#F79C23] to-orange-500 opacity-20 rounded-2xl blur-sm animate-pulse"></div>
                    <i class="fa-solid fa-users text-3xl text-[#F79C23] relative z-10 drop-shadow-lg"></i>
                </div>

                <div class="flex-1 min-w-0">
                    <p class="text-base font-semibold text-gray-600 group-hover:text-gray-900 transition-all duration-300 mb-2 tracking-wide">Total Customers</p>
                    <p class="text-4xl lg:text-5xl font-black bg-gradient-to-r from-gray-900 via-gray-800 to-gray-700 bg-clip-text text-transparent mb-3 leading-none">
                        {{ number_format($totalUsers ?? 20) }}
                    </p>

                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 bg-gradient-to-r from-orange-400 to-orange-500 rounded-full animate-ping"></div>
                        <span class="text-sm text-orange-500 font-bold flex items-center gap-1">
                            <i class="fa-solid fa-arrow-trend-up"></i>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Sparkline Chart -->
            <div class="absolute bottom-4 right-4 w-20 h-4 bg-white/50 rounded-full backdrop-blur-sm border border-white/60 overflow-hidden">
                <div class="h-full bg-gradient-to-r from-orange-400/60 to-orange-500/60 animate-sparkline rounded-full shadow-inner"></div>
            </div>

        </div>

        <!-- Active Therapists - Enhanced -->
        <div class="group relative bg-gradient-to-b from-white/90 to-white/60 backdrop-blur-xl rounded-3xl p-8 border border-white/50 shadow-2xl hover:shadow-orange-500/20 hover:shadow-3xl hover:-translate-y-4 transition-all duration-700 overflow-hidden transform-gpu lg:col-span-1">
            <div class="absolute inset-0 bg-gradient-to-r from-[#F79C23]/10 via-transparent to-emerald-400/10 opacity-0 group-hover:opacity-100 transition-all duration-1000"></div>
            <svg class="absolute -top-6 -right-6 w-24 h-24 opacity-20">
                <circle cx="38" cy="38" r="32" stroke="#10B981" stroke-width="4" fill="none" stroke-dasharray="200" stroke-dashoffset="30" class="animate-dash group-hover:stroke-emerald-400 transition-colors"/>
            </svg>

            <div class="relative flex items-start gap-6">
                <div class="relative w-20 h-20 rounded-2xl bg-gradient-to-br from-emerald-50 to-green-100/60 flex items-center justify-center shadow-2xl group-hover:scale-125 transition-all duration-500 backdrop-blur-sm border-2 border-white/60">
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 to-green-500 opacity-20 rounded-2xl blur-sm animate-pulse"></div>
                    <i class="fa-solid fa-user-doctor text-3xl text-emerald-500 relative z-10 drop-shadow-lg"></i>
                </div>

                <div class="flex-1 min-w-0">
                    <p class="text-base font-semibold text-gray-600 group-hover:text-gray-900 transition-all duration-300 mb-2 tracking-wide">Active Therapists</p>
                    <p class="text-4xl lg:text-5xl font-black bg-gradient-to-r from-emerald-600 via-emerald-700 to-emerald-800 bg-clip-text text-transparent mb-3 leading-none">
                        {{ number_format($activeTherapists ?? 10) }}
                    </p>

                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 bg-gradient-to-r from-emerald-400 to-green-500 rounded-full animate-ping"></div>
                        <span class="text-sm text-emerald-600 font-bold flex items-center gap-1">
                            <i class="fa-solid fa-arrow-trend-up"></i>
                        </span>
                    </div>

                </div>
            </div>

            <div class="absolute bottom-4 right-4 w-20 h-4 bg-white/50 rounded-full backdrop-blur-sm border border-white/60 overflow-hidden">
                <div class="h-full bg-gradient-to-r from-emerald-400/60 to-green-500/60 animate-sparkline rounded-full shadow-inner"></div>
            </div>

        </div>

        <!-- Total Admins - Blue Theme -->
        <div class="group relative bg-gradient-to-b from-white/90 to-white/60 backdrop-blur-xl rounded-3xl p-8 border border-white/50 shadow-2xl hover:shadow-blue-500/20 hover:shadow-3xl hover:-translate-y-4 transition-all duration-700 overflow-hidden transform-gpu lg:col-span-1">
            <div class="absolute inset-0 bg-gradient-to-r from-[#F79C23]/10 via-transparent to-sky-400/10 opacity-0 group-hover:opacity-100 transition-all duration-1000"></div>
            <svg class="absolute -top-6 -right-6 w-24 h-24 opacity-20">
                <circle
                    cx="38"
                    cy="38"
                    r="32"
                    stroke="#0EA5E9"
                    stroke-width="4"
                    fill="none"
                    stroke-dasharray="200"
                    stroke-dashoffset="30"
                    class="animate-dash group-hover:stroke-sky-400 transition-colors"
                />
            </svg>

            <div class="relative flex items-start gap-6">
                <div class="relative w-20 h-20 rounded-2xl bg-gradient-to-br from-sky-50 to-blue-100/60 flex items-center justify-center shadow-2xl group-hover:scale-125 transition-all duration-500 backdrop-blur-sm border-2 border-white/60">
                    <div class="absolute inset-0 bg-gradient-to-r from-sky-400 to-blue-500 opacity-20 rounded-2xl blur-sm animate-pulse"></div>
                    <i class="fa-solid fa-user-shield text-3xl text-sky-500 relative z-10 drop-shadow-lg"></i>
                </div>

                <div class="flex-1 min-w-0">
                    <p class="text-base font-semibold text-gray-600 group-hover:text-gray-900 transition-all duration-300 mb-2 tracking-wide">
                        Total Admins
                    </p>

                    <p class="text-4xl lg:text-5xl font-black bg-gradient-to-r from-sky-600 via-blue-700 to-blue-800 bg-clip-text text-transparent mb-3 leading-none">
                        {{ number_format($activeTherapists ?? 2) }}
                    </p>

                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 bg-gradient-to-r from-sky-400 to-blue-500 rounded-full animate-ping"></div>
                        <span class="text-sm text-sky-600 font-bold flex items-center gap-1">
                    <i class="fa-solid fa-arrow-trend-up"></i>
                </span>
                    </div>
                </div>
            </div>

            <div class="absolute bottom-4 right-4 w-20 h-4 bg-white/50 rounded-full backdrop-blur-sm border border-white/60 overflow-hidden">
                <div class="h-full bg-gradient-to-r from-sky-400/60 to-blue-500/60 animate-sparkline rounded-full shadow-inner"></div>
            </div>
        </div>

    </div>
</main>

<style>
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(2deg); }
    }

    @keyframes float-slow {
        0%, 100% { transform: translateY(0px) rotate(0deg) scale(1); }
        50% { transform: translateY(-10px) rotate(1deg) scale(1.05); }
    }

    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    @keyframes bounce-smooth {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }

    @keyframes dash {
        0% { stroke-dashoffset: 200; }
        100% { stroke-dashoffset: 0; }
    }

    @keyframes sparkline {
        0% { transform: translateX(0) scaleX(1); }
        50% { transform: translateX(100%) scaleX(1.2); }
        100% { transform: translateX(200%) scaleX(1); }
    }

    @keyframes gradient-x {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .animate-float { animation: float 6s ease-in-out infinite; }
    .animate-float-slow { animation: float-slow 8s ease-in-out infinite; }
    .animate-spin-slow { animation: spin-slow 25s linear infinite; }
    .animate-bounce-smooth { animation: bounce-smooth 2s ease-in-out infinite; }
    .animate-dash { animation: dash 2s ease-out infinite; }
    .animate-sparkline { animation: sparkline 2s linear infinite; }
    .animate-gradient-x {
        background-size: 200% 200%;
        animation: gradient-x 3s ease infinite;
    }

    .delay-500 { animation-delay: 0.5s; }
    .delay-1000 { animation-delay: 1s; }
    .delay-2000 { animation-delay: 2s; }

    /* Smooth scrolling and GPU acceleration */
    * { scrollbar-width: thin; scrollbar-color: #F79C23 rgba(255,255,255,0.5); }

    /* Custom scrollbar for Webkit */
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: rgba(255,255,255,0.1); border-radius: 10px; }
    ::-webkit-scrollbar-thumb { background: linear-gradient(#F79C23, orange); border-radius: 10px; }

    /* Enhanced hover effects */
    .group-hover\:scale-125:hover .scale-target { transform: scale(1.25); }
</style>
