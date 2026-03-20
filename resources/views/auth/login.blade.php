<x-guest-layout>

    <x-auth-session-status class="mb-5" :status="session('status')" />

    <div class="max-w-md mx-auto">

        <!-- Header -->
        <div class="text-center mb-7">

            <div class="w-20 h-20 mx-auto mb-2

rounded-3xl

bg-gradient-to-br
from-indigo-50
to-blue-100

flex items-center justify-center

shadow-md
border border-indigo-100">

                <i class="fa-solid fa-user
text-3xl
text-indigo-600"></i>

            </div>

            <h2 class="text-2xl font-semibold text-gray-800 tracking-tight">
                User Login
            </h2>

            <p class="text-sm text-gray-500 mt-2">
                Access your account dashboard
            </p>

        </div>


        <!-- Card -->
        <div class="bg-white

border border-gray-100

shadow-lg
shadow-gray-200/60

rounded-3xl

p-8

transition duration-300
hover:-translate-y-[2px]">


            <form method="POST" action="{{ route('login') }}">
                @csrf


                <!-- Email -->
                <div>

                    <x-input-label
                        for="email"
                        :value="__('Email')"
                        class="text-gray-600 font-medium text-sm"/>

                    <div class="relative mt-2">

                        <i class="fa-solid fa-envelope

absolute left-4 top-4
text-gray-400 text-sm"></i>

                        <x-text-input id="email"

                                      class="block w-full

pl-11
h-11

rounded-xl

border-gray-200

focus:border-indigo-500
focus:ring-2
focus:ring-indigo-500/20

transition"

                                      type="email"
                                      name="email"
                                      :value="old('email')"

                                      placeholder="Enter your email"

                                      required />

                    </div>

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                </div>



                <!-- Password -->
                <div class="mt-6">

                    <x-input-label
                        for="password"
                        :value="__('Password')"
                        class="text-gray-600 font-medium text-sm"/>

                    <div class="relative mt-2">

                        <i class="fa-solid fa-lock

absolute left-4 top-4
text-gray-400 text-sm"></i>

                        <x-text-input id="password"

                                      class="block w-full

pl-11 pr-11

h-11

rounded-xl

border-gray-200

focus:border-indigo-500
focus:ring-2
focus:ring-indigo-500/20

transition"

                                      type="password"
                                      name="password"

                                      placeholder="Enter password"

                                      required />


                        <span onclick="togglePassword()"

                              class="absolute right-4 top-3.5

cursor-pointer

text-gray-400
hover:text-indigo-600

transition">

<svg id="eyeIcon"
     xmlns="http://www.w3.org/2000/svg"

     class="h-5 w-5"

     fill="none"
     viewBox="0 0 24 24"
     stroke="currentColor">

<path stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"

      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>

<path stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"

      d="M2.458 12C3.732 7.943 7.523 5 12 5
c4.477 0 8.268 2.943 9.542 7
-1.274 4.057-5.065 7-9.542
7-4.477 0-8.268-2.943-9.542-7z"/>

</svg>

</span>

                    </div>

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                </div>



                <!-- Remember -->
                <div class="flex items-center justify-between mt-6">

                    <label class="flex items-center gap-2">

                        <input id="remember_me"

                               type="checkbox"

                               class="rounded-md
border-gray-300

text-indigo-600

focus:ring-indigo-500/30"

                               name="remember">

                        <span class="text-sm text-gray-600">
Remember me
</span>

                    </label>


                    @if (Route::has('password.request'))

                        <a class="text-sm

text-gray-500

hover:text-indigo-600

transition"

                           href="{{ route('password.request') }}">

                            Forgot password?

                        </a>

                    @endif

                </div>



                <!-- Button -->
                <div class="mt-7">

                    <x-primary-button

                        class="w-full justify-center

h-11

rounded-xl

bg-gradient-to-r
from-indigo-600
to-blue-600

hover:from-indigo-700
hover:to-blue-700

shadow-md
hover:shadow-lg

active:scale-[0.98]

transition duration-300">

                        {{ __('Log in') }}

                    </x-primary-button>

                </div>


                <!-- Register -->
                <div class="text-center mt-4 mb-4 ">

<span class="text-sm text-gray-500">
Don’t have an account?
</span>

                    <a href="{{ route('register') }}"

                       class="ml-1 text-sm

font-semibold

text-indigo-600

hover:text-indigo-700

transition">

                        Register

                    </a>

                </div>

            </form>

            <!-- Therapist link -->
            <div class="mb-1

bg-gradient-to-r
from-orange-50
to-amber-50

border border-orange-100

rounded-2xl

p-4

flex items-center justify-between

transition duration-300

hover:shadow-md">

                <!-- Left -->
                <div class="flex items-center gap-3">

                    <div class="w-10 h-10

        rounded-xl

        bg-white

        border border-orange-100

        flex items-center justify-center

        shadow-sm">

                        <i class="fa-solid fa-user-doctor
            text-orange-500 text-sm"></i>

                    </div>

                    <div class="text-left">

                        <p class="text-sm font-semibold text-gray-800">
                            Are you Therapist ?
                        </p>

                        <p class="text-xs text-gray-500">
                            Sign in as a therapist
                        </p>

                    </div>

                </div>


                <!-- Right -->
                <a href="{{ route('therapist.login') }}"

                   class="inline-flex items-center gap-2

    text-sm font-semibold

    text-orange-600

    hover:text-orange-700

    hover:gap-3

    transition-all duration-200">

                    Login

                    <i class="fa-solid fa-arrow-right text-xs"></i>

                </a>

            </div>

        </div>



    </div>



    <script>

        function togglePassword(){

            const input =
                document.getElementById("password");

            const icon =
                document.getElementById("eyeIcon");

            if(input.type==="password"){

                input.type="text";

            }
            else{

                input.type="password";

            }

        }

    </script>

</x-guest-layout>
