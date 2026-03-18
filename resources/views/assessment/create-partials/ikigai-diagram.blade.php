<div id="section-ikigai"
     data-section-key="ikigai"
     data-question-count="4"
     class= " relative
            -mx-6 md:-mx-10
            px-6 md:px-12 py-14
            bg-white
            space-y-10">


<!-- Header -->
    <div class="text-center space-y-2">
        <h3 class="text-3xl font-bold text-orange-500">
            Ikigai Calculator
        </h3>
        <p class="text-sm text-slate-500 max-w-lg mx-auto">
            Reflect deeply on these four areas to discover the intersection that
            gives your life meaning.
        </p>
    </div>

    <!-- Diagram Canvas -->
    <div class="relative mx-auto
            w-[320px] h-[320px]
            sm:w-[420px] sm:h-[420px]
            md:w-[560px] md:h-[560px]
            lg:w-[640px] lg:h-[640px]">

        <!-- What You Love -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2
                w-40 h-40
                sm:w-56 sm:h-56
                md:w-72 md:h-72
                rounded-full
                bg-gradient-to-br from-pink-200 to-rose-300
                shadow-xl border border-white/40
                backdrop-blur
                flex flex-col items-center justify-center">

            <p class="font-semibold text-xs md:text-sm text-slate-700">
                What You Love
            </p>

            <input type="text"
                   name="answers[ikigai][love]"
                   placeholder="Eg: Art, Teaching"
                   required
                   class="mt-2 px-3 py-1.5 rounded-full
                      text-xs md:text-sm text-center
                      border border-white/60
                      bg-white/80
                      focus:ring-2 focus:ring-pink-300
                      w-28 sm:w-36 md:w-48">
        </div>


        <!-- What You're Good At -->
        <div class="absolute right-0 top-1/2 -translate-y-1/2
                w-40 h-40
                sm:w-56 sm:h-56
                md:w-72 md:h-72
                rounded-full
                bg-gradient-to-br from-green-200 to-emerald-300
                shadow-xl border border-white/40
                backdrop-blur
                flex flex-col items-center justify-center">

            <p class="font-semibold text-xs md:text-sm text-slate-700">
                What You're Good At
            </p>

            <input type="text"
                   name="answers[ikigai][skill]"
                   placeholder="Eg: Coding, Design"
                   required
                   class="mt-2 px-3 py-1.5 rounded-full
                      text-xs md:text-sm text-center
                      border border-white/60
                      bg-white/80
                      focus:ring-2 focus:ring-green-300
                      w-28 sm:w-36 md:w-48">
        </div>


        <!-- What the World Needs -->
        <div class="absolute left-0 top-1/2 -translate-y-1/2
                w-40 h-40
                sm:w-56 sm:h-56
                md:w-72 md:h-72
                rounded-full
                bg-gradient-to-br from-yellow-200 to-amber-300
                shadow-xl border border-white/40
                backdrop-blur
                flex flex-col items-center justify-center">

            <p class="font-semibold text-xs md:text-sm text-slate-700">
                What the World Needs
            </p>

            <input type="text"
                   name="answers[ikigai][need]"
                   placeholder="Eg: Awareness, Care"
                   required
                   class="mt-2 px-3 py-1.5 rounded-full
                      text-xs md:text-sm text-center
                      border border-white/60
                      bg-white/80
                      focus:ring-2 focus:ring-yellow-300
                      w-28 sm:w-36 md:w-48">
        </div>


        <!-- What You Can Be Paid For -->
        <div class="absolute bottom-0 left-1/2 -translate-x-1/2
                w-40 h-40
                sm:w-56 sm:h-56
                md:w-72 md:h-72
                rounded-full
                bg-gradient-to-br from-blue-200 to-sky-300
                shadow-xl border border-white/40
                backdrop-blur
                flex flex-col items-center justify-center">

            <p class="font-semibold text-xs md:text-sm text-slate-700 text-center px-2">
                What You Can Be Paid For
            </p>

            <input type="text"
                   name="answers[ikigai][paid]"
                   placeholder="Eg: Consulting"
                   required
                   class="mt-2 px-3 py-1.5 rounded-full
                      text-xs md:text-sm text-center
                      border border-white/60
                      bg-white/80
                      focus:ring-2 focus:ring-blue-300
                      w-28 sm:w-36 md:w-48">
        </div>


        <!-- Center IKIGAI -->
        <div class="absolute inset-1/2 -translate-x-1/2 -translate-y-1/2
                w-20 h-20
                sm:w-28 sm:h-28
                md:w-40 md:h-40
                rounded-full
                bg-white/95
                border border-slate-200
                shadow-2xl
                flex flex-col items-center justify-center">

        <span class="text-[10px] md:text-xs text-slate-500 tracking-widest">
            YOUR
        </span>

            <span class="font-bold text-sm md:text-xl
                     bg-gradient-to-r from-orange-500 to-pink-500
                     bg-clip-text text-transparent">
            IKIGAI
        </span>

        </div>

    </div>

    <!-- Submit -->
    <div class="flex justify-center pt-6">
        <button type="button"
                class="submit-section-btn px-8 py-3 rounded-full
                       bg-gradient-to-r from-indigo-500 to-pink-500
                       text-white font-semibold shadow-md
                       hover:scale-[1.03] active:scale-[0.97]
                       transition-all">
            Submit Ikigai →
        </button>
    </div>
</div>
