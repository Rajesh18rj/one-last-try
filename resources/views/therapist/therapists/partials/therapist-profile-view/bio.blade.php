<section class="bg-white/80 backdrop-blur-xl rounded-3xl p-10 shadow-2xl border border-white/50 hover:shadow-3xl transition-all duration-500 group">
    <h3 class="text-2xl font-black bg-gradient-to-r from-[#2A2418] to-[#4A3B26] bg-clip-text text-transparent mb-6 flex items-center gap-4">
        <div class="w-12 h-12 bg-gradient-to-br from-[#F79C23] to-[#FF9F40] rounded-2xl flex items-center justify-center shadow-xl group-hover:rotate-12 transition-transform duration-700">
            <i class="fa-solid fa-circle-info text-xl text-white"></i>
        </div>
        Brief Biography
    </h3>

    <div class="space-y-4">
        <p class="text-md text-[#5A4C34]/90 leading-relaxed max-h-[10rem] lg:max-h-[8rem] overflow-hidden transition-all duration-500 ease-in-out relative" id="bioText">
        {{ $therapist->bio ?: 'No biography available.' }}
        <div id="bioGradient" class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-[#FFF8ED] to-transparent pointer-events-none opacity-0 transition-all duration-500"></div>
        </p>

        <div id="bioToggleContainer" class="flex justify-center opacity-0 transition-all duration-500">
            <button id="toggleBio" class="px-8 py-3 bg-gradient-to-r from-[#F79C23] to-[#FF9F40] text-white font-bold rounded-2xl shadow-lg hover:shadow-xl hover:scale-105 hover:from-[#dc8313] transition-all duration-300 whitespace-nowrap group/btn">
                <span id="toggleText">Read More</span>
                <i id="toggleIcon" class="fa-solid fa-chevron-down ml-2 transition-transform duration-300 group-hover/btn:rotate-180"></i>
            </button>
        </div>
    </div>
</section>
