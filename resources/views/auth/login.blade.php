<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-cover bg-center"
style="background-image: linear-gradient(rgba(0,0,0,.55),rgba(0,0,0,.55)), url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e');">

    <div class="w-full max-w-md bg-white/90 backdrop-blur-lg rounded-3xl shadow-2xl p-8">

        <div class="text-center mb-6">
            <div class="text-5xl mb-3">✈️</div>

            <h1 class="text-3xl font-bold text-blue-700">
                Welcome Back
            </h1>

            <p class="text-gray-500 mt-2">
                Sign in to continue your journey.
            </p>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email"
                    class="block mt-1 w-full rounded-xl"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input
                    id="password"
                    class="block mt-1 w-full rounded-xl"
                    type="password"
                    name="password"
                    required />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-between items-center mb-6">

                <label class="flex items-center">
                    <input type="checkbox" name="remember"
                        class="rounded border-gray-300 text-blue-600">

                    <span class="ml-2 text-sm text-gray-600">
                        Remember me
                    </span>
                </label>

                @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="text-blue-600 hover:underline text-sm">
                        Forgot Password?
                    </a>
                @endif

            </div>

            <button
                class="w-full bg-blue-600 hover:bg-blue-700 transition duration-300 text-white py-3 rounded-xl font-semibold shadow-lg">

                Login

            </button>

        </form>

        <div class="text-center mt-6">

            <span class="text-gray-600">
                Don't have an account?
            </span>

            <a href="{{ route('register') }}"
               class="text-green-600 font-semibold hover:underline">
                Create Account
            </a>

        </div>

    </div>

</div>

</x-guest-layout>