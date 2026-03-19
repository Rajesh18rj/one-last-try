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

    <!-- Ikigai Diagram -->
    <div class="relative mx-auto

w-[92vw] h-[92vw]
max-w-[640px] max-h-[640px]
min-w-[360px] min-h-[360px]">


        <!-- LOVE -->
        <div class="ikigai-circle absolute top-0 left-1/2 -translate-x-1/2

w-[42%] h-[42%]

rounded-full
bg-gradient-to-br from-pink-200 to-rose-300

shadow-xl border border-white/40

flex flex-col items-center justify-center">

            <p class="font-semibold text-[12px] sm:text-sm text-slate-700">
                What You Love
            </p>

            <input
                type="text"

                name="answers[ikigai][love]"

                placeholder="Eg: Art, Teaching"

                required

                class="ikigai-input mt-2 px-3 py-2
rounded-full text-sm text-center

border border-white/60
bg-white/90

focus:ring-2 focus:ring-pink-400

w-[70%]">

        </div>



        <!-- SKILL -->
        <div class="ikigai-circle absolute right-0 top-1/2 -translate-y-1/2

w-[42%] h-[42%]

rounded-full
bg-gradient-to-br from-green-200 to-emerald-300

shadow-xl border border-white/40

flex flex-col items-center justify-center">

            <p class="font-semibold text-[12px] sm:text-sm text-slate-700">
                What You're Good At
            </p>

            <input
                type="text"

                name="answers[ikigai][skill]"

                placeholder="Eg: Coding, Design"

                required

                class="ikigai-input mt-2 px-3 py-2
rounded-full text-sm text-center

border border-white/60
bg-white/90

focus:ring-2 focus:ring-green-400

w-[70%]">

        </div>



        <!-- NEED -->
        <div class="ikigai-circle absolute left-0 top-1/2 -translate-y-1/2

w-[42%] h-[42%]

rounded-full
bg-gradient-to-br from-yellow-200 to-amber-300

shadow-xl border border-white/40

flex flex-col items-center justify-center">

            <p class="font-semibold text-[12px] sm:text-sm text-slate-700">
                What the World Needs
            </p>

            <input
                type="text"

                name="answers[ikigai][need]"

                placeholder="Eg: Awareness, Care"

                required

                class="ikigai-input mt-2 px-3 py-2
rounded-full text-sm text-center

border border-white/60
bg-white/90

focus:ring-2 focus:ring-yellow-400

w-[70%]">

        </div>



        <!-- PAID -->
        <div class="ikigai-circle absolute bottom-0 left-1/2 -translate-x-1/2

w-[42%] h-[42%]

rounded-full
bg-gradient-to-br from-blue-200 to-sky-300

shadow-xl border border-white/40

flex flex-col items-center justify-center">

            <p class="font-semibold text-[12px] sm:text-sm text-slate-700 text-center">
                What You Can Be Paid For
            </p>

            <input
                type="text"

                name="answers[ikigai][paid]"

                placeholder="Eg: Consulting"

                required

                class="ikigai-input mt-2 px-3 py-2
rounded-full text-sm text-center

border border-white/60
bg-white/90

focus:ring-2 focus:ring-blue-400

w-[70%]">

        </div>



        <!-- CENTER -->
        <div class="absolute inset-1/2
-translate-x-1/2 -translate-y-1/2

w-[24%] h-[24%]

rounded-full

bg-white
border border-slate-200
shadow-2xl

flex flex-col items-center justify-center">

<span class="text-[10px] text-slate-500">
YOUR
</span>

            <span class="font-bold text-sm md:text-lg

bg-gradient-to-r from-orange-500 to-pink-500
bg-clip-text text-transparent">

IKIGAI

</span>

            <p class="text-[10px] text-slate-400 text-center px-2 mt-1">

                Find the intersection of passion, skill, purpose and income

            </p>

        </div>

    </div>



    <style>

        .ikigai-circle{

            transition:.25s;

        }

        /* No movement hover */

        .ikigai-circle:hover{

            box-shadow:

                0 0 0 4px rgba(255,255,255,.7),
                0 15px 40px rgba(0,0,0,.08);

        }

        /* Input polish */

        .ikigai-input{

            transition:.2s;

        }

        .ikigai-input:focus{

            box-shadow:

                0 0 0 3px rgba(255,255,255,.9),
                0 10px 25px rgba(0,0,0,.08);

        }

    </style>

    <!-- Premium Ikigai Guide -->
    <div class="pt-14">

        <!-- Header -->
        <div class="text-center mb-10">

            <div class="inline-flex items-center gap-2
                    bg-orange-50 text-orange-500
                    px-4 py-1.5 rounded-full
                    text-xs font-semibold mb-3">

                IKIGAI GUIDE

            </div>

            <h4 class="text-2xl font-bold text-slate-800">
                Discover Your Purpose Step-by-Step
            </h4>

            <p class="text-sm text-slate-500 mt-2 max-w-xl mx-auto">
                Answer honestly. Your Ikigai lives where passion,
                talent, impact, and income meet.
            </p>

        </div>


        <!-- Cards -->
        <div class="relative">

            <!-- Connecting line -->
            <div class="hidden lg:block absolute top-16 left-0 right-0 h-[2px]
                    bg-gradient-to-r from-pink-200 via-emerald-200
                    via-amber-200 to-sky-200">
            </div>


            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-7 relative">

                <!-- CARD 1 -->
                <div class="group relative bg-white/80 backdrop-blur
                        border border-white shadow-lg
                        rounded-3xl p-6
                        hover:shadow-2xl hover:-translate-y-2
                        transition duration-500">

                    <div class="absolute -top-5 left-6
                            w-12 h-12 rounded-2xl
                            bg-gradient-to-br from-pink-400 to-rose-500
                            text-white flex items-center justify-center
                            text-xl shadow-lg">

                        <i class="fa-solid fa-heart
                              group-hover:scale-110 transition">
                        </i>

                    </div>

                    <div class="pt-6">

                        <div class="text-xs font-semibold
                                text-pink-400 mb-2">

                            STEP 01

                        </div>

                        <h4 class="font-semibold text-lg
                               text-slate-800 mb-3">

                            What You Love

                        </h4>

                        <ul class="space-y-2 text-sm text-slate-600">

                            <li>• What excites you daily</li>

                            <li>• What you enjoy learning</li>

                            <li>• What you do without pressure</li>

                            <li>• What gives satisfaction</li>

                        </ul>

                        <div class="mt-5 text-xs
                                bg-pink-50 text-slate-500
                                p-3 rounded-xl">

                            Art • Teaching • Building apps • Music

                        </div>

                    </div>

                </div>



                <!-- CARD 2 -->
                <div class="group relative bg-white/80 backdrop-blur
                        border border-white shadow-lg
                        rounded-3xl p-6
                        hover:shadow-2xl hover:-translate-y-2
                        transition duration-500">

                    <div class="absolute -top-5 left-6
                            w-12 h-12 rounded-2xl
                            bg-gradient-to-br from-emerald-400 to-green-500
                            text-white flex items-center justify-center
                            text-xl shadow-lg">

                        <i class="fa-solid fa-brain
                              group-hover:scale-110 transition">
                        </i>

                    </div>

                    <div class="pt-6">

                        <div class="text-xs font-semibold
                                text-emerald-400 mb-2">

                            STEP 02

                        </div>

                        <h4 class="font-semibold text-lg
                               text-slate-800 mb-3">

                            What You're Good At

                        </h4>

                        <ul class="space-y-2 text-sm text-slate-600">

                            <li>• Your strongest skills</li>

                            <li>• Things you learn fast</li>

                            <li>• What others praise</li>

                            <li>• Your confidence areas</li>

                        </ul>

                        <div class="mt-5 text-xs
                                bg-green-50 text-slate-500
                                p-3 rounded-xl">

                            Coding • Analysis • Speaking • Planning

                        </div>

                    </div>

                </div>



                <!-- CARD 3 -->
                <div class="group relative bg-white/80 backdrop-blur
                        border border-white shadow-lg
                        rounded-3xl p-6
                        hover:shadow-2xl hover:-translate-y-2
                        transition duration-500">

                    <div class="absolute -top-5 left-6
                            w-12 h-12 rounded-2xl
                            bg-gradient-to-br from-amber-400 to-yellow-500
                            text-white flex items-center justify-center
                            text-xl shadow-lg">

                        <i class="fa-solid fa-earth-asia
                              group-hover:scale-110 transition">
                        </i>

                    </div>

                    <div class="pt-6">

                        <div class="text-xs font-semibold
                                text-amber-400 mb-2">

                            STEP 03

                        </div>

                        <h4 class="font-semibold text-lg
                               text-slate-800 mb-3">

                            What The World Needs

                        </h4>

                        <ul class="space-y-2 text-sm text-slate-600">

                            <li>• Problems you notice</li>

                            <li>• People you want to help</li>

                            <li>• Social change you want</li>

                            <li>• Value you can give</li>

                        </ul>

                        <div class="mt-5 text-xs
                                bg-yellow-50 text-slate-500
                                p-3 rounded-xl">

                            Education • Digital tools • Guidance

                        </div>

                    </div>

                </div>



                <!-- CARD 4 -->
                <div class="group relative bg-white/80 backdrop-blur
                        border border-white shadow-lg
                        rounded-3xl p-6
                        hover:shadow-2xl hover:-translate-y-2
                        transition duration-500">

                    <div class="absolute -top-5 left-6
                            w-12 h-12 rounded-2xl
                            bg-gradient-to-br from-sky-400 to-blue-500
                            text-white flex items-center justify-center
                            text-xl shadow-lg">

                        <i class="fa-solid fa-briefcase
                              group-hover:scale-110 transition">
                        </i>

                    </div>

                    <div class="pt-6">

                        <div class="text-xs font-semibold
                                text-sky-400 mb-2">

                            STEP 04

                        </div>

                        <h4 class="font-semibold text-lg
                               text-slate-800 mb-3">

                            What You Can Be Paid For

                        </h4>

                        <ul class="space-y-2 text-sm text-slate-600">

                            <li>• Marketable skills</li>

                            <li>• Freelance opportunities</li>

                            <li>• Career options</li>

                            <li>• Business potential</li>

                        </ul>

                        <div class="mt-5 text-xs
                                bg-blue-50 text-slate-500
                                p-3 rounded-xl">

                            Web development • Training • Consulting

                        </div>

                    </div>

                </div>


            </div>

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

