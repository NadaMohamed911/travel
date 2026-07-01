<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">

                @forelse($trips as $trip)
<div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition relative">

    <span class="absolute top-3 left-3 bg-red-500 text-white text-xs px-3 py-1 rounded-full font-bold shadow-lg z-10">
        🔥 Hot Trip
    </span>

    <img
        src="{{ $trip->image ? asset('storage/' . $trip->image) : 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e' }}"
        class="w-full h-48 object-cover"
    >

                    <div class="p-5">

                        <h3 class="text-xl font-bold">
                            {{ $trip->name }}
                        </h3>

                        <p class="text-green-600 font-bold text-lg mt-2">
                            {{ $trip->price }} EGP
                        </p>

                        <div class="mt-2 text-yellow-500 font-bold">
                            ⭐ {{ number_format($trip->reviews_avg_rating ?? 0,1) }}/5
                            <span class="text-gray-600 text-sm">
                                ({{ $trip->reviews->count() }} Reviews)
                            </span>
                        </div>

                        <p class="text-gray-600 mt-2">
                            📅 Trip Date:
                            {{ \Carbon\Carbon::parse($trip->trip_date)->format('d-m-Y') }}
                        </p>

                        <p class="text-gray-500 text-sm mt-2">
                            Discover amazing destinations and enjoy an unforgettable travel experience.
                        </p>

                        @php
                            $booked = $trip->bookings->sum('persons');
                            $remaining = $trip->max_persons - $booked;
                        @endphp

                        <p class="mt-3 text-blue-600 font-semibold">
                            Remaining Seats: {{ $remaining }}
                        </p>


                        @php
    $percentage = $trip->max_persons > 0
        ? ($booked / $trip->max_persons) * 100
        : 0;
@endphp

<div class="mt-3">

    <div class="flex justify-between text-sm mb-1">
        <span>Booking</span>
        <span>{{ round($percentage) }}%</span>
    </div>

    <div class="w-full bg-gray-200 rounded-full h-3">

 <div
    class="{{ $percentage >= 80 ? 'bg-red-600' : ($percentage >= 50 ? 'bg-yellow-500' : 'bg-green-600') }} h-3 rounded-full"
    style="width: {{ $percentage }}%">
</div>

    </div>

</div>

                        <form action="{{ route('bookings.store', $trip->id) }}" method="POST">
                            @csrf

                            <div class="mt-3">
                                <label class="block mb-1 font-medium">
                                    Number of Persons
                                </label>

                                <input
                                    type="number"
                                    name="persons"
                                    value="1"
                                    min="1"
                                    class="border rounded-lg p-2 w-full"
                                    required
                                >
                            </div>

                            @if($remaining > 0)

                                <button
                                    type="submit"
                                    class="w-full mt-4 bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl font-semibold">
                                    Book Now
                                </button>

                            @else

                                <button
                                    type="button"
                                    disabled
                                    class="w-full mt-4 bg-red-600 text-white py-3 rounded-xl font-semibold cursor-not-allowed">
                                    Fully Booked
                                </button>

                            @endif

                        </form>

                        @if($trip->reviews->count())

                        <div class="mt-6">
                            <h4 class="font-bold text-lg mb-3">
                                Customer Reviews
                            </h4>

                            @foreach($trip->reviews as $review)

                            <div class="border rounded-xl p-3 mb-3 bg-gray-50">

                                <div class="flex justify-between items-center">

                                    <div>
                                        <h5 class="font-bold">
                                            {{ $review->user->name }}
                                        </h5>

                                        <small class="text-gray-500">
                                            {{ $review->created_at->format('d-m-Y') }}
                                        </small>
                                    </div>

                                    <div class="text-yellow-500">
                                        @for($i=1;$i<=5;$i++)
                                            @if($i <= $review->rating)
                                                ⭐
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </div>

                                </div>

                                @if($review->comment)
                                    <p class="mt-2 text-gray-700 italic">
                                        "{{ $review->comment }}"
                                    </p>
                                @endif

                            </div>

                            @endforeach

                        </div>

                        @else

                            <p class="text-gray-500 mt-5">
                                No reviews yet.
                            </p>

                        @endif

                    </div>

                </div>

                @empty

                    <div class="col-span-3 text-center text-gray-500 text-lg">
                        No Trips Available
                    </div>

                @endforelse

            </div>

        </div>
    </div>
</x-app-layout>