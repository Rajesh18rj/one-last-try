<x-guest-layout>

    <h2 class="text-2xl font-bold text-center mb-8 mt-6 text-[#F79C23] hover:text-[#d88410]">
        Therapist Login
    </h2>

    <form method="POST" action="{{ route('therapist.login.submit') }}">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" type="email" name="email" class="block w-full mt-1" required />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Password" />
            <x-text-input id="password" type="password" name="password" class="block w-full mt-1" required />
        </div>

        <div class="flex justify-end mt-6">
            <x-primary-button>
                Login as Therapist
            </x-primary-button>
        </div>
    </form>

    <div class="text-center mt-4">
        <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:underline">
            Back to User Login
        </a>
    </div>

</x-guest-layout>
