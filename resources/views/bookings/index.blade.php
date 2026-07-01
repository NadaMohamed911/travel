<x-app-layout>

    <div class="py-12">

        <div class="max-w-6xl mx-auto">


@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif


            <h2 class="text-3xl font-bold mb-6">
                My Bookings
            </h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse($bookings as $booking)

                    <div class="bg-white shadow-lg rounded-2xl p-6">

                        <h3 class="text-xl font-bold">
                            {{ $booking->trip->name }}
                        </h3>

                        <p class="text-green-600 font-bold mt-2">
                            {{ $booking->trip->price }} EGP
                        </p>


      


<p class="mt-3">
    @if($booking->status == 'Pending')
        <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full font-semibold">
            🟡 Pending
        </span>

    @elseif($booking->status == 'Confirmed')
        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full font-semibold">
            🟢 Confirmed
        </span>

    @else
        <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full font-semibold">
            🔴 Cancelled
        </span>
    @endif
</p>


                       <p class="text-gray-500 mt-3">
    Trip Date:
    {{ \Carbon\Carbon::parse($booking->trip->trip_date)->format('d-m-Y') }}
</p>

                        <p class="text-gray-600 mt-2">
    Persons: {{ $booking->persons }}
</p>


<form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="mt-4">
    @csrf
    @method('DELETE')

    <button
        type="submit"
        class="bg-red-600 text-white px-4 py-2 rounded-lg">
        Cancel Booking
    </button>

<a
href="{{ route('bookings.invoice',$booking->id) }}"
class="block mt-3 bg-blue-600 text-white text-center py-2 rounded-lg">

Download Invoice PDF

</a>

</form>

@if(
    $booking->status == 'Confirmed'
    &&
    \Carbon\Carbon::today()->gte(
        \Carbon\Carbon::parse($booking->trip->trip_date)
    )
)

<form action="{{ route('reviews.store') }}" method="POST" class="mt-4">
    @csrf

    <input type="hidden" name="trip_id" value="{{ $booking->trip->id }}">

    <label class="font-medium">Rating</label>

    <select
        name="rating"
        class="border rounded-lg w-full p-2 mt-2"
        required>
        <option value="5">⭐⭐⭐⭐⭐</option>
        <option value="4">⭐⭐⭐⭐</option>
        <option value="3">⭐⭐⭐</option>
        <option value="2">⭐⭐</option>
        <option value="1">⭐</option>
    </select>

    <textarea
        name="comment"
        class="border rounded-lg w-full p-2 mt-3"
        placeholder="Write your review..."></textarea>

    <button
        class="bg-yellow-500 text-white px-4 py-2 rounded-lg mt-3 w-full">
        Submit Review
    </button>

</form>

@else

<div class="mt-4 p-3 bg-gray-100 rounded-lg text-gray-600 text-sm">
    ⭐ You can review this trip after it is completed.
</div>

@endif



                    </div>

                @empty

                    <div class="text-gray-500">
                        No bookings yet.
                    </div>

                @endforelse

            </div>

        </div>

    </div>

</x-app-layout>