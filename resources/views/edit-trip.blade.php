<x-app-layout><div class="py-12 bg-gray-100 min-h-screen">

    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white p-8 rounded-2xl shadow-xl">

            <h2 class="text-3xl font-bold mb-6 text-gray-800">
                ✈️ Edit Trip
            </h2>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('trips.update', $trip->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-5">

                    <label class="block text-gray-700 font-semibold mb-2">
                        Trip Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ $trip->name }}"
                        class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                </div>

                <div class="mb-6">

                    <label class="block text-gray-700 font-semibold mb-2">
                        Price
                    </label>

                    <input
                        type="number"
                        name="price"
                        value="{{ $trip->price }}"
                        class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >

                </div>

                <div class="flex gap-4">

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition">
                        Update Trip
                    </button>

                    <a
                        href="{{ route('dashboard') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold transition">
                        Back
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>