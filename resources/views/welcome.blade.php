<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Agency Portal</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>

<div class="min-h-screen bg-cover bg-center flex items-center justify-center"
     style="background-image: linear-gradient(rgba(0,0,0,.55),rgba(0,0,0,.55)), url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e');">

    <div class="text-center text-white max-w-3xl px-6">

        <div class="text-7xl mb-6">
            ✈️
        </div>

        <h1 class="text-6xl font-extrabold mb-4">
            Travel Agency Portal
        </h1>

        <p class="text-xl text-gray-200 mb-10">
            Explore the world with unforgettable travel experiences.
            Book your next adventure with just one click.
        </p>

        @guest
        <div class="flex justify-center gap-6">

            <a href="{{ route('login') }}"
               class="bg-blue-600 hover:bg-blue-700 transition duration-300 px-8 py-4 rounded-xl text-lg font-semibold shadow-lg">
                Login
            </a>

            <a href="{{ route('register') }}"
               class="bg-green-600 hover:bg-green-700 transition duration-300 px-8 py-4 rounded-xl text-lg font-semibold shadow-lg">
                Create Account
            </a>

        </div>
        @else

        <a href="{{ route('dashboard') }}"
           class="bg-blue-600 hover:bg-blue-700 px-8 py-4 rounded-xl text-lg font-semibold shadow-lg">
            Dashboard
        </a>

        @endguest

        <div class="grid grid-cols-3 gap-8 mt-16">

            <div>
                <h2 class="text-4xl font-bold">500+</h2>
                <p class="text-gray-300">Trips</p>
            </div>

            <div>
                <h2 class="text-4xl font-bold">1000+</h2>
                <p class="text-gray-300">Bookings</p>
            </div>

            <div>
                <h2 class="text-4xl font-bold">24/7</h2>
                <p class="text-gray-300">Support</p>
            </div>

        </div>

    </div>

</div>

</body>
</html>