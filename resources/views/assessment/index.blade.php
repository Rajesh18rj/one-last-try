@extends('layouts.guest-new')

@section('content')

    <div class="min-h-[75vh] flex items-center justify-center
            bg-gradient-to-br
            from-[#FFF8ED] via-[#FFEFD8] to-[#FFF0D9]
            pt-24 pb-10 relative overflow-hidden">

        {{-- Warm radial glows --}}
        <div class="pointer-events-none absolute inset-0
        bg-[radial-gradient(circle_at_top,_#F79C2322,_transparent_55%),radial-gradient(circle_at_bottom,_#FFB84D26,_transparent_55%)]">
        </div>

        {{-- Soft grid --}}
        <div class="pointer-events-none absolute inset-0 opacity-30
        [background-image:linear-gradient(to_right,rgba(247,156,35,0.15)_1px,transparent_1px),linear-gradient(to_bottom,rgba(247,156,35,0.15)_1px,transparent_1px)]
        [background-size:48px_48px] mix-blend-soft-light">
        </div>

        {{-- Decorative warm blobs --}}
        <div class="absolute -top-32 -left-20 w-80 h-80
                bg-gradient-to-br from-[#F79C23]/35 via-[#FFB84D]/30 to-[#FFD18A]/25
                rounded-full blur-3xl"></div>

        <div class="absolute -bottom-40 -right-10 w-96 h-96
                bg-gradient-to-tr from-[#FFB84D]/35 via-[#F79C23]/30 to-[#FFD18A]/25
                rounded-full blur-3xl"></div>

        <div class="relative max-w-3xl w-full px-4">
            <div class="relative bg-white/80 backdrop-blur-2xl
                    border border-white/60
                    rounded-[2.25rem]
                    shadow-[0_24px_70px_rgba(247,156,35,0.25)]
                    px-8 md:px-12 py-10 md:py-14 text-center overflow-hidden">

                {{-- Accent glow --}}
                <div class="absolute -top-24 right-10 w-52 h-52
                        bg-gradient-to-br from-[#F79C23]/35 via-transparent to-[#FFB84D]/35
                        blur-3xl -z-10"></div>

                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full
                        bg-[#FFF3D6] border border-[#FFD18A]
                        text-xs font-medium text-[#7A4A12] mb-6 lg:-mt-6">
                    <span class="flex h-1.5 w-1.5 rounded-full bg-[#F79C23] animate-pulse"></span>
                    Personalized care in under 3 minutes
                </div>

                {{-- Icon --}}
                <div class="w-20 h-20 mx-auto mb-6 rounded-3xl
                        bg-gradient-to-br from-[#F79C23] via-[#FFB84D] to-[#FFD18A]
                        flex items-center justify-center
                        shadow-[0_18px_45px_rgba(247,156,35,0.45)]">
                    <i class="fa-solid fa-clipboard-list text-white text-3xl"></i>
                </div>

                {{-- Heading --}}
                <h1 class="text-3xl md:text-5xl font-extrabold mb-4 leading-tight
                       bg-gradient-to-r from-[#F79C23] via-[#FFB84D] to-[#d88410]
                       bg-clip-text text-transparent">
                    Start Your Personalized Assessment
                </h1>

                {{-- Description --}}
                <p class="text-[#7A6E54] text-base md:text-lg leading-relaxed
                      max-w-xl mx-auto mb-8">
                    Answer a few gentle questions about how you feel,
                    and we’ll help connect you with the right therapist for you.
                </p>

                {{-- CTA --}}
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-6">
                    <a href="{{ route('assessment.create') }}"
                       class="inline-flex items-center justify-center gap-2
                          px-9 py-3.5 rounded-2xl font-semibold text-white
                          bg-gradient-to-r from-[#F79C23] to-[#FF9F40]
                          shadow-xl hover:shadow-2xl
                          hover:scale-[1.03] active:scale-[0.99]
                          transition-all duration-300">
                        <i class="fa-solid fa-play text-sm"></i>
                        <span>Start Assessment</span>
                    </a>

                    <button type="button"
                            class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium
                               rounded-2xl border border-[#FFD18A]
                               text-[#7A4A12]
                               bg-[#FFF3D6] hover:bg-[#FFE8C7]
                               transition">
                        <span class="h-2 w-2 rounded-full bg-[#F79C23]"></span>
                        How it works
                    </button>
                </div>

                {{-- Privacy --}}
                <p class="text-xs text-[#8A7A5C] mb-6">
                    Your responses are private and shared only with licensed professionals.
                </p>

                {{-- Login Notice --}}
                @guest
                <div class="mt-2 flex items-center justify-between gap-4
                        p-4 rounded-2xl bg-[#FFF3D6]
                        border border-[#FFD18A] text-left">

                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl
                                bg-gradient-to-br from-[#F79C23] to-[#FFB84D]
                                flex items-center justify-center">
                            <i class="fa-solid fa-lock text-white text-sm"></i>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-[#7A4A12]">
                                Please log in before taking the assessment.
                            </p>
                            <p class="text-[11px] text-[#8A7A5C] mt-0.5">
                                This helps us securely save your progress.
                            </p>
                        </div>
                    </div>

                    <a href="{{ route('login') }}"
                       class="shrink-0 text-xs font-semibold text-[#F79C23]
                          hover:text-[#d88410] underline underline-offset-4">
                        Log in
                    </a>
                </div>
                @endguest

            </div>
        </div>
    </div>

@endsection
