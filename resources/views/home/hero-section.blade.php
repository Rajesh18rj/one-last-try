<section class="w-full min-h-auto bg-[#fbeac2] flex items-center lg:py-8 py-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">

        <!-- Left Content -->
        <div class="space-y-4 lg:space-y-6 lg:pl-10 mt-24 flex flex-col items-center lg:items-start text-center lg:text-left">

            <!-- Heading Group 1 -->
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold tracking-tight text-[#2a2f28] whitespace-nowrap">
                Your mental wellbeing matters
            </h1>

            <!-- Heading Group 2 -->
            <h1 class="text-xl sm:text-3xl md:text-4xl lg:text-5xl font-bold tracking-tight text-[#f7921e] whitespace-nowrap">
                Understand yourself better
            </h1>

            <!-- Subtitle -->
            <p class="text-xs sm:text-sm md:text-base lg:text-lg text-gray-700 whitespace-nowrap pb-10">
                A simple self-assessment to reflect on your emotions, habits, and inner balance.
            </p>

            <!-- CTA Button -->
            <a href="{{ route('assessments.index') }}"
               class="inline-flex items-center justify-center gap-3 bg-[#f7921e] text-white px-6 py-2.5 rounded-full font-semibold shadow-md
               hover:bg-[#df7d0e] transition-all duration-200 text-sm md:text-base">
                Start My Assessment →
            </a>
        </div>

        <!-- Right Image -->
        <div class="relative flex justify-center lg:justify-end mt-0 lg:mt-0">
            <img src="{{ asset('images/home.png') }}"
                 alt="Therapist Illustration"
                 class="w-auto object-contain mt-8 lg:mt-0
            translate-x-0 lg:translate-x-24 2xl:translate-x-32
            translate-y-0 lg:translate-y-8">

        </div>

    </div>
</section>
