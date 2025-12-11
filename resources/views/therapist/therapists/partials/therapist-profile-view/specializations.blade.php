@php
    $specRaw = $therapist->specializations;
    $specializations = is_array($specRaw) ? $specRaw :
                     (is_string($specRaw) ? (json_decode($specRaw, true) ?? array_map('trim', explode(',', $specRaw))) : []);
@endphp

<section class="bg-white/80 backdrop-blur-xl rounded-3xl p-10 shadow-2xl border border-white/50 hover:shadow-3xl transition-all duration-500">
    <h3 class="text-2xl font-black bg-gradient-to-r from-[#2A2418] to-[#4A3B26] bg-clip-text text-transparent mb-8 flex items-center gap-4">
        <div class="w-12 h-12 bg-gradient-to-br from-[#4A90E2] to-[#6AA8F7] rounded-2xl flex items-center justify-center shadow-xl">
            <i class="fa-solid fa-stethoscope text-xl text-white"></i>
        </div>
        Specializations
    </h3>

    @if(!empty($specializations))
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 text-center">
            @foreach($specializations as $spec)
                <div class="group p-4 bg-gradient-to-br from-[#FFF4DD] to-[#FFFBF0] border-2 border-[#FFCE7A]/50 rounded-2xl hover:bg-gradient-to-br hover:from-[#F79C23]/10 hover:to-[#FF9F40]/10 hover:border-[#F79C23]/70 hover:shadow-xl hover:scale-105 transition-all duration-400 cursor-pointer">
                    <span class="text-lg font-bold text-[#4A3B26] group-hover:text-[#F79C23] transition-colors">{{ $spec }}</span>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <div class="w-24 h-24 bg-[#E2E2E2] rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid fa-circle-exclamation text-2xl text-[#AAA]"></i>
            </div>
            <p class="text-xl text-[#7A7055] font-medium">Specializations not added yet.</p>
        </div>
    @endif
</section>
