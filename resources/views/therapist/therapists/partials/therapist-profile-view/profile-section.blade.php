<div class="bg-white/80 backdrop-blur-xl rounded-3xl px-8 py-12 shadow-2xl border border-white/50 flex flex-col lg:flex-row gap-12 relative overflow-hidden">
    {{-- Gradient Decorations --}}
    <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-r from-[#F79C23]/20 to-[#FFCE7A]/20 rounded-bl-[60%] blur-xl -z-10"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-gradient-to-t from-[#FFE2B5]/30 to-transparent rounded-tr-[60%] blur-xl -z-10"></div>

    {{-- Profile Image with Glass Effect --}}
    <div class="w-full lg:w-1/4 flex justify-center lg:pt-8">
        <div class="relative group">
            <div class="w-56 h-56 rounded-3xl bg-gradient-to-br from-[#F79C23]/10 to-[#FFCE7A]/10 border-8 border-white/70 shadow-3xl group-hover:scale-105 transition-all duration-500 overflow-hidden">
                <img src="{{ $therapist->profile_image ? asset('storage/'.$therapist->profile_image) : asset('images/profile_placeholder.jpg') }}"
                     class="w-full h-full rounded-2xl object-cover group-hover:scale-110 transition-transform duration-700">
            </div>
            <div class="absolute -top-3 -right-3 w-12 h-12 bg-[#47C774] rounded-2xl flex items-center justify-center shadow-lg">
                <i class="fa-solid fa-circle-check text-xl text-white"></i>
            </div>
        </div>
    </div>

    {{-- Info Section --}}
    <div class="flex-1 lg:pt-4">
        <div class="flex items-start lg:items-center gap-4 mb-6 flex-wrap">
            <h1 class="text-3xl lg:text-4xl font-black bg-gradient-to-r from-[#1E1B16] to-[#2A2418] bg-clip-text text-transparent leading-tight">
                {{ $therapist->user->name }}
            </h1>
            <div class="w-3 h-3 bg-[#47C774] rounded-full animate-pulse mt-2 lg:mt-0"></div>
        </div>

        <p class="text-2xl font-bold text-[#7A6E54]/90 mb-6 tracking-wide">{{ $therapist->professional_title }}</p>

        {{-- Enhanced Quick Info Grid --}}
        @php
            $languagesRaw = $therapist->languages;
            $languages = is_array($languagesRaw) ? $languagesRaw :
                       (is_string($languagesRaw) ? (json_decode($languagesRaw, true) ?? array_map('trim', explode(',', $languagesRaw))) : []);
        @endphp

        <div class="grid lg:grid-cols-2 gap-4 bg-gradient-to-r from-[#FFF4DD] to-[#FFFBF0] rounded-3xl p-8 border border-[#FFCE7A]/50 shadow-xl backdrop-blur-sm">
            <div class="space-y-3">
                <div class="flex items-center gap-3 p-3 bg-white/60 rounded-2xl shadow-sm">
                    <div class="w-10 h-10 bg-gradient-to-br from-[#F79C23] to-[#FF9F40] rounded-xl flex items-center justify-center">
                        <i class="fa-solid fa-user-graduate text-white text-sm"></i>
                    </div>
                    <div>
                        <span class="font-bold text-[#4A3B26] text-sm block">Qualifications</span>
                        <span class="text-[#5A4C34] font-medium">{{ $therapist->qualifications ?? 'Not Provided' }}</span>
                    </div>
                </div>
                <div class="flex items-center gap-3 p-3 bg-white/60 rounded-2xl shadow-sm">
                    <div class="w-10 h-10 bg-gradient-to-br from-[#47C774] to-[#6FD18A] rounded-xl flex items-center justify-center">
                        <i class="fa-solid fa-clock text-white text-sm"></i>
                    </div>
                    <div>
                        <span class="font-bold text-[#4A3B26] text-sm block">Experience</span>
                        <span class="text-[#5A4C34] font-medium">{{ $therapist->experience_years ?? 0 }} years</span>
                    </div>
                </div>
            </div>
            <div class="space-y-3">
                <div class="flex items-center gap-3 p-3 bg-white/60 rounded-2xl shadow-sm">
                    <div class="w-10 h-10 bg-gradient-to-br from-[#4A90E2] to-[#6AA8F7] rounded-xl flex items-center justify-center">
                        <i class="fa-solid fa-globe text-white text-sm"></i>
                    </div>
                    <div>
                        <span class="font-bold text-[#4A3B26] text-sm block">Languages</span>
                        <span class="text-[#5A4C34] font-medium">{{ $languages ? implode(', ', $languages) : 'Not specified' }}</span>
                    </div>
                </div>
                <div class="flex items-center gap-3 p-3 bg-white/60 rounded-2xl shadow-sm">
                    <div class="w-10 h-10 bg-gradient-to-br from-[#F59E0B] to-[#FBBF24] rounded-xl flex items-center justify-center">
                        <i class="fa-solid fa-map-pin text-white text-sm"></i>
                    </div>
                    <div>
                        <span class="font-bold text-[#4A3B26] text-sm block">Location</span>
                        <span class="text-[#5A4C34] font-medium">{{ $therapist->city ?? '-' }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Enhanced Actions --}}
        <div class="flex flex-col sm:flex-row gap-4 mt-10">
            <button class="flex-1 border-2 border-[#F7A531]/70 text-[#F79C23] px-8 py-4 rounded-3xl font-semibold hover:bg-[#FFF1D6]/80 backdrop-blur-sm transition-all duration-300 hover:shadow-xl hover:scale-[1.02] group">
                <i class="fa-solid fa-share-nodes mr-3 group-hover:translate-x-1 transition-transform"></i>Share Profile
            </button>
            <a href="#booking" class="flex-1 px-8 py-4 bg-gradient-to-r from-[#F79C23] to-[#FF9F40] text-white font-bold rounded-3xl shadow-2xl hover:shadow-3xl hover:scale-[1.02] transition-all duration-300 text-center flex items-center justify-center">
                <i class="fa-solid fa-calendar-check mr-3"></i>Book Now
            </a>
        </div>
    </div>
</div>
