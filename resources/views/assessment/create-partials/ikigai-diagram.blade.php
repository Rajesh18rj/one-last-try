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
                w-[420px] h-[420px]
                md:w-[480px] md:h-[480px]">

        <!-- What You Love -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2
                    w-64 h-64 rounded-full
                    bg-pink-200/60
                    flex flex-col items-center justify-center">
            <p class="font-semibold text-sm text-slate-700">
                What You Love
            </p>
            <input type="text"
                   name="answers[ikigai][love]"
                   placeholder="Eg: Art, Teaching"
                   required
                   class="mt-2 px-4 py-1.5 rounded-full
                          text-sm text-center border w-44">
        </div>

        <!-- What You're Good At -->
        <div class="absolute right-0 top-1/2 -translate-y-1/2
                    w-64 h-64 rounded-full
                    bg-green-200/60
                    flex flex-col items-center justify-center">
            <p class="font-semibold text-sm text-slate-700">
                What You're Good At
            </p>
            <input type="text"
                   name="answers[ikigai][skill]"
                   placeholder="Eg: Coding, Design"
                   required
                   class="mt-2 px-4 py-1.5 rounded-full
                          text-sm text-center border w-44">
        </div>

        <!-- What the World Needs -->
        <div class="absolute left-0 top-1/2 -translate-y-1/2
                    w-64 h-64 rounded-full
                    bg-yellow-200/60
                    flex flex-col items-center justify-center">
            <p class="font-semibold text-sm text-slate-700">
                What the World Needs
            </p>
            <input type="text"
                   name="answers[ikigai][need]"
                   placeholder="Eg: Awareness, Care"
                   required
                   class="mt-2 px-4 py-1.5 rounded-full
                          text-sm text-center border w-44">
        </div>

        <!-- What You Can Be Paid For -->
        <div class="absolute bottom-0 left-1/2 -translate-x-1/2
                    w-64 h-64 rounded-full
                    bg-blue-200/60
                    flex flex-col items-center justify-center">
            <p class="font-semibold text-sm text-slate-700">
                What You Can Be Paid For
            </p>
            <input type="text"
                   name="answers[ikigai][paid]"
                   placeholder="Eg: Consulting"
                   required
                   class="mt-2 px-4 py-1.5 rounded-full
                          text-sm text-center border w-44">
        </div>

        <!-- Center IKIGAI -->
        <div class="absolute inset-1/2 -translate-x-1/2 -translate-y-1/2
                    w-36 h-36 rounded-full bg-white
                    shadow-lg flex flex-col items-center justify-center">
            <span class="text-xs text-slate-500 tracking-wide">
                YOUR
            </span>
            <span class="font-bold text-lg text-slate-800">
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
