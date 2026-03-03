<main class="flex-1 p-4 md:p-6 lg:p-8 relative overflow-hidden">

    <!-- Soft Healing Background -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-20 w-64 h-64 bg-gradient-to-r from-[#F79C23]/20 to-amber-300/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute top-1/2 right-20 w-48 h-48 bg-gradient-to-b from-amber-300/20 to-[#FFE2A8]/30 rounded-full blur-2xl animate-float delay-1000"></div>
        <div class="absolute bottom-32 left-1/2 w-80 h-80 bg-gradient-to-t from-[#FFF8E8]/40 to-transparent rounded-full blur-3xl animate-pulse delay-2000"></div>
    </div>

    <!-- Therapist Hero Card -->
    <div class="relative bg-gradient-to-br from-white/95 via-white/85 to-white/70 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/40 shadow-orange-400/10 p-8 lg:p-12 overflow-hidden group/card">

        <!-- Soft Glow Border -->
        <div class="absolute inset-0 bg-gradient-to-r from-[#F79C23]/20 via-transparent to-amber-300/20 rounded-3xl blur-xl opacity-0 group-hover/card:opacity-100 transition-all duration-700"></div>

        <!-- Floating Shapes -->
        <div class="absolute top-6 left-6 w-24 h-24 bg-gradient-to-br from-[#FFE2A8]/40 to-transparent rounded-2xl rotate-12 animate-float-slow"></div>
        <div class="absolute bottom-8 right-8 w-20 h-20 border-2 border-[#F79C23]/30 rounded-xl animate-bounce-smooth delay-500"></div>

        <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-10 z-10">

            <!-- Welcome Section -->
            <div class="flex-1 lg:pr-8">

                <div class="inline-flex items-center gap-3 px-5 py-3 bg-gradient-to-r from-[#F79C23]/15 to-[#FFE2A8]/30 rounded-2xl border border-[#F79C23]/30 shadow-md mb-6 hover:scale-105 transition-all duration-300">
                    <div class="w-3 h-3 bg-[#F79C23] rounded-full animate-pulse"></div>
                    <span class="text-sm font-semibold text-[#F79C23] tracking-wide">
                        Your Therapy Space
                    </span>
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black bg-gradient-to-r from-gray-900 via-gray-800 to-gray-700 bg-clip-text text-transparent leading-[2.2] mb-6 space-y-2 tracking-tight">
                    Welcome back,
                    <span class="pb-2 block bg-gradient-to-r from-[#F79C23] to-amber-500 bg-clip-text text-transparent animate-gradient-x">
                        {{ auth()->user()->name ?? 'Therapist' }}
                    </span>
                </h1>

                <p class="text-gray-600 text-lg max-w-xl mt-4">
                    Support your clients, manage your sessions, and create a peaceful healing experience.
                </p>

            </div>

            <!-- Therapist Illustration -->
            <div class="relative lg:w-64 lg:h-64 w-40 h-40 lg:flex hidden items-center justify-center rounded-3xl bg-gradient-to-br from-[#FFF8E8]/90 to-[#FFEED0]/70 shadow-2xl border-4 border-white/60 backdrop-blur-xl group/hero">

                <!-- Healing Aura -->
                <div class="absolute inset-0 bg-gradient-to-r from-[#F79C23]/20 via-[#FFE2A8]/30 to-[#F79C23]/20 rounded-3xl animate-spin-slow opacity-40 blur-md"></div>

                <!-- Core -->
                <div class="absolute w-32 h-32 bg-gradient-to-br from-[#F79C23] to-amber-400 rounded-3xl shadow-2xl animate-pulse group-hover/hero:scale-110 transition-all duration-500"></div>

                <!-- Icon -->
                <i class="fa-solid fa-spa text-5xl lg:text-7xl text-white relative z-20 drop-shadow-2xl animate-bounce-smooth"></i>

                <!-- Badges -->
                <div class="absolute -top-4 -right-4 bg-emerald-400/90 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg animate-float">
                    CARE
                </div>

                <div class="absolute -bottom-4 -left-4 bg-[#F79C23]/90 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg rotate-12 animate-pulse delay-1000">
                    WELLNESS
                </div>

            </div>

        </div>
    </div>

</main>

<style>
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }

    @keyframes float-slow {
        0%, 100% { transform: translateY(0px) scale(1); }
        50% { transform: translateY(-10px) scale(1.05); }
    }

    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    @keyframes bounce-smooth {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }

    @keyframes gradient-x {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .animate-float { animation: float 6s ease-in-out infinite; }
    .animate-float-slow { animation: float-slow 8s ease-in-out infinite; }
    .animate-spin-slow { animation: spin-slow 25s linear infinite; }
    .animate-bounce-smooth { animation: bounce-smooth 2s ease-in-out infinite; }

    .animate-gradient-x {
        background-size: 200% 200%;
        animation: gradient-x 3s ease infinite;
    }

    .delay-500 { animation-delay: 0.5s; }
    .delay-1000 { animation-delay: 1s; }
    .delay-2000 { animation-delay: 2s; }

    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-thumb { background: linear-gradient(#F79C23, orange); border-radius: 10px; }
</style>
