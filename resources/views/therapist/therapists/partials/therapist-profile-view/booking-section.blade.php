<aside id="booking"  class="bg-white/90 backdrop-blur-2xl rounded-3xl p-6 shadow-2xl border border-white/60 lg:sticky lg:top-28 h-fit hover:shadow-3xl transition-all duration-500 lg:max-h-[calc(140vh-12rem)] overflow-y-auto">

    <div class="text-center mb-4">
        <div class="w-12 h-12 bg-gradient-to-br from-[#F79C23] to-[#FF9F40] rounded-3xl flex items-center justify-center mx-auto mb-2 shadow-xl">
            <i class="fa-solid fa-calendar-check text-xl text-white"></i>
        </div>
        <h3 class="text-2xl font-black bg-gradient-to-r from-[#2A2418] to-[#4A3B26] bg-clip-text text-transparent mb-0">Book Your Slot</h3>
        <p class="text-[#7A6E54] font-medium">Secure your appointment instantly</p>
    </div>

    @php
        // ================================================================
        // 🔥 FIXED LOGIC — matches your stored JSON exactly
        // ================================================================
        $availableDays = json_decode($therapist->available_days, true) ?? [];
        $timeSlots = json_decode($therapist->available_time_slots, true) ?? [];

        // therapist->session_mode = "online" / "in_person" / "both"
        $sessionMode = $therapist->session_mode;
        $isOnlineAvailable = in_array($sessionMode, ['online', 'both']);
        $isInPersonAvailable = in_array($sessionMode, ['in_person', 'both']);

        // ================================================================
        // 🔥 Generate next 14 days based on stored days ("Sunday", "Monday"...)
        // ================================================================
        $dateOptions = [];
        $today = \Carbon\Carbon::today();
        for ($i = 0; $i < 14; $i++) {
            $date = $today->copy()->addDays($i);
            $dayName = $date->format('l'); // RETURNS "Sunday", "Monday", etc.

            if (in_array($dayName, $availableDays)) {
                $dateOptions[] = $date;
            }
        }
    @endphp

    {{-- SESSION MODE BUTTONS --}}
    <div class="flex gap-3 mb-4 p-0 bg-gradient-to-r from-[#FFF4DD] to-[#FFFBF0] rounded-2xl">

        <button data-mode="online"
                class="mode-btn flex-1 px-3 py-3 rounded-lg text-sm font-semibold transition-all duration-300
            {{ $isOnlineAvailable ? 'bg-gradient-to-r from-[#F79C23] to-[#FF9F40] border border-[#FFCE7A] text-white shadow-md' : 'bg-gray-100 text-gray-400 cursor-not-allowed' }}"
            {{ !$isOnlineAvailable ? 'hidden' : '' }}>
            <i class="fa-solid fa-video mr-1 text-xs"></i>Online
        </button>

        <button data-mode="in_person"
                class="mode-btn flex-1 px-3 py-2 rounded-lg text-sm font-semibold transition-all duration-300
            {{ $isInPersonAvailable ? 'bg-gradient-to-r from-orange-400 to-orange-500 border border-[#FFCE7A] text-white shadow-md' : 'bg-gray-100 text-gray-400 cursor-not-allowed' }}"
            {{ !$isInPersonAvailable ? 'hidden' : '' }}>
            <i class="fa-solid fa-location-dot mr-1 text-xs"></i>In-Person
        </button>

    </div>


    {{-- DATE SELECTOR --}}
    <div class="mb-6">
        <label class="block text-sm font-bold text-[#7A6E54] mb-2">Select Date</label>

        @if(count($dateOptions))
            <div id="dateContainer"
                 class="flex gap-3 overflow-x-auto pb-3 scrollbar-thin scrollbar-thumb-[#F79C23]/50 snap-x snap-mandatory">

                @foreach($dateOptions as $i => $date)
                    <button data-date="{{ $date->format('Y-m-d') }}"
                            class="date-btn min-w-[88px] px-4 py-3 snap-center text-center rounded-xl shadow
                                   transition-all duration-300 flex-shrink-0
                                   {{ $i === 0 ? 'bg-gradient-to-br from-[#F79C23] to-[#FF9F40] text-white shadow-lg' : 'bg-white text-[#2E3826] border border-[#F79C23]/20' }}">
                        <div class="text-xs font-semibold">{{ strtoupper($date->format('D')) }}</div>
                        <div class="font-black text-lg mt-1">{{ $date->format('d') }}</div>
                        <div class="text-xs opacity-80">{{ $date->format('M') }}</div>
                    </button>
                @endforeach

            </div>
        @else
            <p class="text-center text-gray-500 py-10">No available days configured</p>
        @endif
    </div>

    {{-- TIME SLOT SELECTOR --}}
    <div class="mb-8">
        <label class="block text-sm font-bold text-[#7A6E54] mb-1">Select Time</label>

        <div id="timeSlotsGrid" class="grid grid-cols-2 sm:grid-cols-3 gap-2">
            {{-- Slots appear dynamically using JS --}}
        </div>

        <p class="text-xs text-[#A8916C] mt-2">Click a slot to select</p>
    </div>

    {{-- SELECTED DETAILS --}}
    <div id="selectedInfo" class="hidden mb-4 p-2 bg-[#F79C23]/10 rounded-2xl border border-[#F79C23]/30 text-center">
        <p id="selectedDetails" class="text-sm font-bold text-[#F79C23]"></p>
    </div>

    {{-- BOOKING BUTTON --}}
    <button id="bookButton"
            class="w-full px-8 py-2 bg-gradient-to-r from-[#F79C23] to-[#FF9F40]
                   text-white font-black text-lg rounded-3xl shadow-xl
                   transition-all duration-300 disabled:opacity-40 disabled:cursor-not-allowed">

        <span id="bookButtonText">Select a date & time</span>
    </button>

</aside>

<script>
    window.timeSlotsData = @json($timeSlots);
</script>
