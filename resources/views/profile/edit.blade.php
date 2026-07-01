<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            👤 My Profile
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <!-- Profile Card -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-6">

                <div class="flex items-center gap-6">

                    <img
                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&size=120"
                        class="w-24 h-24 rounded-full shadow"
                    >

                    <div>
                        <h2 class="text-3xl font-bold">
                            {{ Auth::user()->name }}
                        </h2>

                        <p class="text-gray-500 mt-2">
                            {{ Auth::user()->email }}
                        </p>

                        <p class="text-green-600 font-semibold mt-2">
                            Welcome back ✈️
                        </p>
                    </div>

                </div>

            </div>

            <!-- Update Profile -->
            <div class="p-6 bg-white shadow-lg rounded-2xl mb-6">
                <div class="max-w-2xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Change Password -->
            <div class="p-6 bg-white shadow-lg rounded-2xl mb-6">
                <div class="max-w-2xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="p-6 bg-white shadow-lg rounded-2xl">
                <div class="max-w-2xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>

    </div>
</x-app-layout>