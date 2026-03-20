<x-guest-layout>

    <div class="max-w-md mx-auto">

        <!-- Header -->
        <div class="text-center mb-7">

            <div class="w-20 h-20 mx-auto mb-5
        rounded-3xl

        bg-gradient-to-br
        from-[#FFF7ED]
        to-[#FFE4C7]

        flex items-center justify-center

        shadow-md
        border border-[#fde6c8]">

                <i class="fa-solid fa-user-doctor
            text-3xl
            text-[#F79C23]"></i>

            </div>

            <h2 class="text-2xl font-semibold text-[#2a2f28] tracking-tight">
                Therapist Login
            </h2>

            <p class="text-sm text-gray-500 mt-2">
                Access your therapist dashboard
            </p>

        </div>


        <!-- Card -->
        <div class="bg-white

    border border-[#f3ece2]

    shadow-lg
    shadow-[#f1eadf]/60

    rounded-3xl

    p-8

    transition duration-300">

            <form method="POST" action="{{ route('therapist.login.submit') }}">
                @csrf

                <!-- Email -->
                <div>

                    <x-input-label
                        for="email"
                        value="Email Address"
                        class="text-gray-600 text-sm font-medium"/>

                    <div class="relative mt-2">

                        <i class="fa-solid fa-envelope
                    absolute left-4 top-4
                    text-gray-400 text-sm"></i>

                        <x-text-input id="email"
                                      type="email"
                                      name="email"

                                      class="block w-full
                    pl-11 pr-4

                    h-11

                    rounded-xl

                    border-[#e8e1d7]

                    focus:border-[#F79C23]
                    focus:ring-[#F79C23]

                    transition"

                                      placeholder="Enter your email"
                                      required />

                    </div>

                </div>


                <!-- Password -->
                <div class="mt-6">

                    <x-input-label
                        for="password"
                        value="Password"
                        class="text-gray-600 text-sm font-medium"/>

                    <div class="relative mt-2">

                        <i class="fa-solid fa-lock
                    absolute left-4 top-4
                    text-gray-400 text-sm"></i>

                        <x-text-input id="password"
                                      type="password"
                                      name="password"

                                      class="block w-full
                    pl-11 pr-11

                    h-11

                    rounded-xl

                    border-[#e8e1d7]

                    focus:border-[#F79C23]
                    focus:ring-[#F79C23]

                    transition"

                                      placeholder="Enter your password"
                                      required />


                        <!-- Toggle -->
                        <span onclick="togglePassword()"

                              class="absolute right-4 top-3.5

                    cursor-pointer

                    text-gray-400
                    hover:text-[#F79C23]

                    transition">

                        <i id="eyeIcon"
                           class="fa-solid fa-eye"></i>

                    </span>

                    </div>

                </div>


                <!-- Login Button -->
                <div class="mt-8">

                    <x-primary-button

                        class="w-full justify-center

                h-11

                bg-gradient-to-r
                from-[#F79C23]
                to-[#f4a63a]

                hover:from-[#e48a12]
                hover:to-[#da8a1c]

                focus:from-[#e48a12]

                rounded-xl

                shadow-md
                hover:shadow-lg

                transition duration-300">

                        <i class="fa-solid fa-right-to-bracket mr-2"></i>

                        Login as Therapist

                    </x-primary-button>

                </div>

            </form>


            <!-- Divider -->
            <div class="flex items-center gap-4 my-7">

                <div class="flex-1 h-px bg-gradient-to-r from-transparent to-gray-200"></div>

                <span class="text-xs text-gray-400 font-medium">
                OR
            </span>

                <div class="flex-1 h-px bg-gradient-to-l from-transparent to-gray-200"></div>

            </div>


            <!-- Back link -->
            <div class="text-center">

                <a href="{{ route('login') }}"

                   class="inline-flex items-center gap-2

            text-sm font-medium

            text-gray-600

            hover:text-[#F79C23]

            transition duration-300">

                    <i class="fa-solid fa-arrow-left text-xs"></i>

                    Back to User Login

                </a>

            </div>

        </div>

    </div>


    <script>

        function togglePassword(){

            const input = document.getElementById("password");
            const icon = document.getElementById("eyeIcon");

            if(input.type==="password"){

                input.type="text";

                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");

            }
            else{

                input.type="password";

                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");

            }

        }

    </script>

</x-guest-layout>
