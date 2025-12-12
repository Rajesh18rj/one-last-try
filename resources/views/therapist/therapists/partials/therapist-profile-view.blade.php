@extends('layouts.guest-new')
@section('content')

    <div class="bg-gradient-to-br from-[#FFF8ED] via-[#FEF5E7] to-[#FFF0D9] min-h-screen py-20 relative overflow-hidden">
        {{-- Animated Background Elements --}}
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-[#FFE2B5]/20 rounded-full animate-pulse"></div>
            <div class="absolute top-1/2 left-10 w-60 h-60 bg-[#FFF4DD]/30 rounded-full animate-bounce delay-300"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-[#FFCE7A]/10 rounded-full animate-ping delay-700"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 xl:px-0 relative z-10">
            {{-- HEADER PROFILE --}}
                @include('therapist.therapists.partials.therapist-profile-view.profile-section')

            <div class="mt-16 lg:mt-10 grid lg:grid-cols-3 gap-8 lg:gap-12">
                {{-- LEFT SECTION --}}
                <div class="lg:col-span-2 flex flex-col gap-8 lg:gap-12">

                    {{-- BIO --}}
                        @include('therapist.therapists.partials.therapist-profile-view.bio')

                    {{-- SPECIALIZATIONS --}}
                        @include('therapist.therapists.partials.therapist-profile-view.specializations')

                </div>

                {{--  BOOKING PANEL --}}
                    @include('therapist.therapists.partials.therapist-profile-view.booking-section')

            </div>
        </div>
    </div>

    <style>
        .line-clamp-4, .line-clamp-5, .line-clamp-6 {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .scrollbar-thin::-webkit-scrollbar { height: 16px; width: 12px; }
        .scrollbar-thin::-webkit-scrollbar-track { background: #FFF4DD; }
        .scrollbar-thin::-webkit-scrollbar-thumb { background: #F79C2380; border-radius: 2px; }
        .scrollbar-thin::-webkit-scrollbar-thumb:hover { background: #F79C23; }
    </style>


    <script src="{{ asset('js/therapist-profile-view.js') }}"></script>

@endsection
