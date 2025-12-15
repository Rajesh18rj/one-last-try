@extends('layouts.guest-new1')

@section('content')

    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-10 py-2">

        {{-- LEFT CARD --}}
        <div
            class="relative p-8 rounded-3xl shadow-2xl bg-gradient-to-br from-[#FFF8EA] to-[#FFEECF] border border-[#FFDA9B]">

            {{-- Glow Border Animation --}}
            <div class="absolute inset-0 rounded-3xl border-[3px] border-transparent animate-pulse bg-gradient-to-r from-[#F79C23]/20 via-[#FFDD9A]/30 to-[#F79C23]/20 opacity-40 pointer-events-none"></div>

            {{-- Back --}}
            <a href="{{ url()->previous() !== url()->current() ? url()->previous() : route('therapists.index') }}"
               class="text-[#4A3B26] flex items-center mb-5 font-semibold hover:opacity-70">
                <i class="fa-solid fa-arrow-left mr-2"></i> Back
            </a>


            {{-- Heading --}}
            <h2 class="text-xl font-black text-[#4A3B26]">Therapy Session With</h2>

            {{-- Profile Section --}}
            <div class="flex items-center gap-5 mt-5">

                {{-- Profile Image with Glow --}}
                <div class="relative">
                    <div class="absolute inset-0 rounded-2xl blur-[10px] bg-gradient-to-br from-[#F79C23]/30 to-[#FF9F40]/40"></div>

                    <img src="{{ asset('storage/' . $therapist->profile_image) }}"
                         class="relative w-20 h-20 rounded-2xl object-cover border-2 border-white shadow-xl"
                         alt="Therapist Photo">
                </div>

                {{-- Name & Title --}}
                <div>
                    <h1 class="text-3xl font-extrabold text-[#2A2418] tracking-tight">
                        {{ $therapist->user->name }}
                    </h1>

                    <p class="text-sm text-[#7A6E54] font-medium mt-1">
                        {{ $therapist->professional_title }}
                    </p>
                </div>
            </div>

            {{-- Divider --}}
            <div class="h-[2px] bg-gradient-to-r from-[#F79C23]/40 to-[#FFCE7A]/40 my-6 rounded-full"></div>

            {{-- Qualifications --}}
            <div class="space-y-4">

                <p class="text-sm text-[#4A3B26] leading-relaxed">
                    <strong class="font-semibold">Qualifications:</strong><br>
                    {{ $therapist->qualifications }}
                </p>

                {{-- Experience --}}
                <p class="text-sm text-[#4A3B26]">
                    <strong class="font-semibold">Experience:</strong>
                    {{ $therapist->experience_years }} years
                </p>

                {{-- Languages --}}
                @php
                    $langs = $therapist->languages;
                    if (is_string($langs)) {
                        $decoded = json_decode($langs, true);
                        $langs = is_array($decoded) ? $decoded : [];
                    }
                @endphp

                <p class="text-sm text-[#4A3B26]">
                    <strong class="font-semibold">Languages:</strong>
                    {{ implode(', ', $langs) }}
                </p>

                {{-- Mode --}}
                <div class="mt-3 flex items-center gap-2 text-sm font-semibold text-green-700">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ ucfirst($mode) }} • 1 hr session
                </div>

                {{-- Date & Time --}}
                <div class="text-sm text-[#4A3B26] mt-4">
                    <strong class="font-semibold">Date & Time:</strong><br>
                    {{ \Carbon\Carbon::parse($date)->format('D, d M Y') }},
                    {{ $slot }} IST
                </div>

            </div>

            {{-- Payment Summary --}}
            <div class="mt-7 bg-white/70 backdrop-blur-xl p-6 rounded-2xl shadow-md border border-[#FFD89B]">

                <h3 class="font-bold text-lg text-[#2A2418] mb-4">Payment Summary</h3>

                <div class="flex justify-between text-sm text-[#4A3B26] mb-1">
                    <span>Session Fee</span>
                    <span>₹{{ $therapist->session_fee }}</span>
                </div>

                <div class="flex justify-between text-sm text-[#4A3B26] mb-1">
                    <span>Booking Fee</span>
                    <span>₹99</span>
                </div>

                <div class="flex justify-between text-sm font-bold text-[#4A3B26] mt-3">
                    <span>Total Fee</span>
                    <span>₹{{ $therapist->session_fee + 99 }}</span>
                </div>

            </div>

        </div>

        {{-- RIGHT CARD --}}
        <div class="bg-white/90 backdrop-blur-xl p-8 rounded-3xl shadow-xl border border-[#FFCE7A]">

            <h3 class="text-xl font-black text-[#4A3B26] mb-5">Enter Your Basic Details</h3>

            <form method="POST" action="#" class="space-y-6">
                @csrf

                {{-- NAME --}}
                <div>
                    <label class="text-sm font-semibold">Name*</label>
                    <input type="text"
                           value="{{ auth()->user()->name }}"
                           class="w-full p-3 border border-[#FFDCA0] rounded-xl bg-[#FFF9F0] focus:ring-2 focus:ring-[#F79C23]"
                           required>
                </div>

                {{-- EMAIL --}}
                <div>
                    <label class="text-sm font-semibold">Email*</label>
                    <input type="email"
                           value="{{ auth()->user()->email }}"
                           class="w-full p-3 border border-[#FFDCA0] rounded-xl bg-gray-100"
                           disabled>
                </div>

                {{-- PHONE --}}
                <div>
                    <label class="text-sm font-semibold">Phone*</label>
                    <input type="text"
                           value="{{ auth()->user()->phone ?? '' }}"
                           class="w-full p-3 border border-[#FFDCA0] rounded-xl bg-[#FFF9F0] focus:ring-2 focus:ring-[#F79C23]"
                           required>
                </div>

                {{-- MESSAGE --}}
                <div>
                    <label class="text-sm font-semibold">Additional Message</label>
                    <textarea class="w-full p-3 border border-[#FFDCA0] rounded-xl bg-[#FFF9F0] focus:ring-2 focus:ring-[#F79C23]"
                              rows="3"
                              placeholder="Any additional information you'd like to share..."></textarea>
                </div>

                {{-- PAY NOW --}}
                <button type="submit"
                        class="w-full py-3 bg-gradient-to-r from-[#F79C23] to-[#FF9F40]
                           text-white font-bold rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300">
                    Pay Now
                </button>

                <p class="text-xs text-[#7A6E54] mt-2 text-center">
                    Booking Fee: ₹99 (Non-refundable after 24 hours)
                </p>
            </form>

        </div>

    </div>

@endsection
