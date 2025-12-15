<div class="bg-[#FFF8ED] min-h-screen pt-12 pb-20">
    <div class="max-w-7xl mx-auto px-4">

        {{-- Heading --}}
        <h2 class="text-[32px] md:text-[34px] font-semibold text-[#2E3826] leading-snug mb-10">
            Discover professional therapy and counselling services
        </h2>

        {{-- Filters --}}
        @include('therapist.therapists.partials.card-details-filters')

        {{-- Therapist Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8" id="therapist-container">

            @foreach($therapists as $therapist)
                @php
                    $specializations = json_decode($therapist->specializations, true) ?? [];
                    $languages = json_decode($therapist->languages, true) ?? [];
                @endphp

                {{-- Therapist Card --}}
                <div class="therapist-card bg-white group rounded-3xl border border-[#E9E2D2]
                        shadow-[0_6px_20px_rgba(0,0,0,0.06)] p-6 hover:shadow-[0_10px_30px_rgba(0,0,0,0.12)]
                        hover:-translate-y-1 transition"

                     data-title="{{ strtolower($therapist->professional_title) }}"
                     data-gender="{{ strtolower($therapist->gender) }}"
                     data-language="{{ strtolower(implode(',', $languages)) }}"
                     data-mode="{{ strtolower($therapist->session_mode) }}"
                     data-specializations="{{ strtolower(implode(',', $specializations)) }}"
                >

                    <div class="flex gap-6">
                        {{-- Picture --}}
                        <div class="w-32 h-44 sm:w-22 sm:h-32 overflow-hidden rounded-2xl bg-[#FDF6E9] shadow">
                            <img
                                src="{{ $therapist->profile_image
                                        ? asset('storage/' . $therapist->profile_image)
                                        : asset('images/profile_placeholder.jpg') }}"
                                class="w-full h-full object-cover"
                                alt="{{ $therapist->user->name }}">
                        </div>

                        {{-- Info --}}
                        <div class="flex-1">
                            {{-- Likes --}}
{{--                            <p class="text-[11px] text-[#A8916C] flex items-center gap-1 mb-1">--}}
{{--                                <i class="fa-regular fa-heart text-[12px] text-[#F29C1F]"></i>--}}
{{--                                0 likes--}}
{{--                            </p>--}}

                            {{-- Name --}}
                            <h3 class="text-[18px] text-[#2E3826] lg:text-[24px] font-semibold flex items-center gap-2">
                                {{ $therapist->user->name }}
                                <span class="text-[#33B86A] text-[16px]">
                                    <i class="fa-solid fa-circle-check"></i>
                                </span>
                            </h3>

                            {{-- Title --}}
                            <p class="text-[16px] text-[#7E6E51] font-semibold mb-3">
                                {{ $therapist->professional_title }}
                            </p>

                            {{-- Specializations --}}
                            <div class="flex flex-wrap gap-2">
                                @foreach(array_slice($specializations, 0, 4) as $spec)
                                    <span class="px-3 py-[5px] bg-[#FFF6DE] rounded-full lg:text-[14px] text-[12px]
                                         text-[#54492F] font-semibold border border-[#f7921e]">
                                        {{ $spec }}
                                    </span>
                                @endforeach

                                @if(count($specializations) > 4)
                                    <span class="px-3 py-[5px] bg-[#FAD69F] rounded-full text-[14px]
                                         text-[#674B21] font-medium">
                                        + {{ count($specializations) - 4 }}
                                    </span>
                                @endif
                            </div>

                            {{-- Mode --}}
                            @php
                                $modeText = match($therapist->session_mode) {
                                    'in_person' => 'In-Person',
                                    'online'    => 'Online',
                                    'both'        => 'In-Person, Online',
                                    default     => ucfirst($therapist->session_mode),
                                };
                            @endphp

                            <p class="text-[16px] font-semibold text-[#7E7057] mt-6">
                                Available Via:
                                <span class="pl-2 font-semibold text-gray-400 text-[15px]">
                                    {{ $modeText }}
                                </span>
                            </p>

                        </div>
                    </div>

                    {{-- Footer --}}
                    <div class="mt-6 pt-4 border-t border-[#EFE8D8] flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between text-[12px]">

                        <div class="w-full sm:w-auto">
                            <p class="text-[#A8916C] text-[14px]">Fee per session</p>
                            <p class="text-[#1C8A42] text-[15px] font-bold">
                                ₹{{ $therapist->session_fee }}
                            </p>
                        </div>

                        <div class="w-full sm:w-auto sm:text-right">
                            <p class="text-[#A8916C] text-[14px]">Languages</p>
                            <p class="text-[#493F2C] text-[13px] font-semibold">
                                {{ implode(', ', $languages) }}
                            </p>
                        </div>

                        <a href="{{ route('therapists.show', $therapist->slug) }}"
                           class="w-full sm:w-auto text-center bg-blue-600 text-white text-[14px] font-semibold px-5 py-2.5 rounded-full
              shadow hover:bg-blue-700 hover:shadow-lg transition">
                            Book Now
                        </a>
                    </div>

                </div>
            @endforeach

        </div>

        {{-- No Results Message --}}
        <p id="no-results" class="hidden text-center text-[#7A7055] mt-10 text-sm">
            No therapists available for your selected filters.
        </p>

    </div>
</div>
