@extends('layouts.guest-new')

@section('content')
    <section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-amber-50 via-orange-50 to-yellow-50 px-4 py-12">
        <div class="max-w-lg w-full">
            <div class="relative overflow-hidden rounded-3xl bg-white/80 backdrop-blur-xl border border-amber-200 shadow-2xl px-8 py-10">

                <!-- Top gradient border -->
                <div class="pointer-events-none absolute inset-x-0 -top-px h-px bg-gradient-to-r from-amber-400 via-orange-400 to-yellow-400"></div>

                <!-- Icon -->
                <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-2xl bg-green-500/10 ring-1 ring-green-400/40">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-green-400 via-green-500 to-green-600 text-white shadow-lg shadow-green-500/40">
                        <i class="fa-solid fa-check text-3xl"></i>
                    </div>
                </div>

                <!-- Heading -->
                <h1 class="text-center text-3xl font-semibold tracking-tight text-amber-900">
                    Submission Successful!
                </h1>

                <!-- Subtitle -->
                <p class="mt-3 text-center text-sm text-amber-700 leading-relaxed">
                    Your details have been received successfully. Our admin team will review your information and notify you once approved.
                </p>

                <!-- Info pill -->
                <div class="mt-6 flex items-center justify-center">
                <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-amber-100 to-orange-100 px-4 py-2 text-xs font-medium text-amber-800 ring-1 ring-amber-200">
                    <span class="inline-block h-2 w-2 rounded-full bg-orange-400"></span>
                    Review time: 24–48 hours
                </span>
                </div>

                <!-- Button -->
                <div class="mt-8 flex justify-center">
                    <a href="{{ route('welcome') }}"
                       class="group inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-amber-500 via-orange-500 to-yellow-500 px-8 py-3 text-sm font-semibold text-white shadow-lg shadow-orange-500/40 transition-all duration-200 hover:shadow-orange-500/60 hover:-translate-y-1 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-400 focus-visible:ring-offset-2 focus-visible:ring-offset-amber-50">
                        <i class="fa-solid fa-home group-hover:-translate-x-0.5 transition-transform"></i>
                        Back to Home
                    </a>
                </div>

                <!-- Footer note -->
                <p class="mt-6 text-center text-xs text-amber-600 font-medium">
                    Confirmation email will be sent once approved.
                </p>
            </div>
        </div>
    </section>
@endsection
