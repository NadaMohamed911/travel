<nav x-data="{ open: false }" class="bg-gradient-to-r from-blue-700 via-blue-600 to-green-600 shadow-xl sticky top-0 z-50">

    <!-- Primary Navigation Menu -->

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">



 <a href="{{ route('trips.index') }}" class="flex items-center gap-3">
    <span class="text-4xl">✈️</span>

    <div>
        <h1 class="text-white text-2xl font-extrabold">
            Travel Agency
        </h1>

        <p class="text-blue-100 text-xs">
            Explore the World
        </p>
    </div>
</a>
                </div>

                <!-- Navigation Links -->
                 
<div class="hidden sm:flex items-center gap-8 ml-10">

@if(Auth::user()->email == 'nada2@gmail.com')
<a href="{{ route('dashboard') }}"
class="text-white font-semibold hover:text-yellow-300 transition duration-300">
📊 Dashboard
</a>
@endif

<a href="{{ route('trips.index') }}"
class="text-white font-semibold hover:text-yellow-300 transition duration-300">
🌍 Trips
</a>

<a href="{{ route('bookings.index') }}"
class="text-white font-semibold hover:text-yellow-300 transition duration-300">
📅 My Bookings
</a>

</div>
</div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        
                     <button
class="flex items-center gap-3 bg-white/20 text-white px-4 py-2 rounded-full hover:bg-white/30 transition">

<div class="w-10 h-10  bg-white rounded-2xl shadow-2xl text-blue-700 flex items-center justify-center font-bold">
{{ strtoupper(substr(Auth::user()->name,0,1)) }}
</div>

<div>
{{ Auth::user()->name }}
</div>

</button>

                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
