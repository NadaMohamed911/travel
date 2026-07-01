<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-cover bg-center"
style="background-image: linear-gradient(rgba(0,0,0,.60), rgba(0,0,0,.60)), url('https://images.unsplash.com/photo-1469854523086-cc02fe5d8800');">

    <div class="w-full max-w-lg bg-white/90 backdrop-blur-lg rounded-3xl shadow-2xl p-8">

        <div class="text-center mb-6">

            <div class="text-5xl mb-3">🌍✈️</div>

            <h1 class="text-3xl font-bold text-green-700">
                Create Your Account
            </h1>

            <p class="text-gray-600 mt-2">
                Join us and start exploring amazing trips.
            </p>

        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Full Name')" />
                <x-text-input id="name"
                    class="block mt-1 w-full rounded-xl"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name" />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email"
                    class="block mt-1 w-full rounded-xl"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username" />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password"
                    class="block mt-1 w-full rounded-xl"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation"
                    class="block mt-1 w-full rounded-xl"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex flex-col items-center mt-6">

                <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-xl transition duration-300">
                    Create Account
                </button>

                <div class="mt-5 text-center">

                    <span class="text-gray-600">
                        Already have an account?
                    </span>

                    <a href="{{ route('login') }}"
                        class="text-blue-600 font-semibold hover:underline">
                        Login
                    </a>

                </div>

            </div>

        </form>

    </div>

</div>

</x-guest-layout>