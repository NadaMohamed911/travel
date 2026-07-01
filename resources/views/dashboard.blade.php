<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trips Management') }}
        </h2>
    </x-slot>

    <div class="py-12">


<div class="bg-gradient-to-r from-blue-600 to-green-500 rounded-2xl p-8 text-white mb-8">

    <h1 class="text-4xl font-bold">
        Welcome, {{ auth()->user()->name }} 👋
    </h1>

    <p class="mt-2 text-lg">
        Manage your trips and bookings easily.
    </p>

</div>


    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif



<!-- Statistics Cards -->

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

    <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-2xl p-6 shadow-xl hover:scale-105 transition duration-300">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm">Total Trips</p>
                <h2 class="text-4xl font-bold">{{ $tripsCount }}</h2>
            </div>
            <div class="text-5xl">🌍</div>
        </div>
    </div>

    <div class="bg-gradient-to-r from-green-500 to-green-700 text-white rounded-2xl p-6 shadow-xl hover:scale-105 transition duration-300">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm">Bookings</p>
                <h2 class="text-4xl font-bold">{{ $bookingsCount }}</h2>
            </div>
            <div class="text-5xl">📅</div>
        </div>
    </div>

    <div class="bg-gradient-to-r from-purple-600 to-purple-800 text-white rounded-2xl p-6 shadow-xl hover:scale-105 transition duration-300">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm">Users</p>
                <h2 class="text-4xl font-bold">{{ $usersCount }}</h2>
            </div>
            <div class="text-5xl">👥</div>
        </div>
    </div>

    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-2xl p-6 shadow-xl hover:scale-105 transition duration-300">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm">Revenue</p>
                <h2 class="text-3xl font-bold">{{ $revenue }} EGP</h2>
            </div>
            <div class="text-5xl">💰</div>
        </div>
    </div>

</div>



</div>


<!-- Add Trip Card -->
 

<div class="bg-white rounded-xl shadow-lg p-6 mb-8">
    <h3 class="text-xl font-bold mb-4">Add New Trip</h3>
    
    <form action="{{ route('trips.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    

<div>
    <input
        type="number"
        name="max_persons"
        placeholder="Maximum Persons"
        class="border rounded-lg p-3 w-full"
        required
    >
</div>


  <div class="grid md:grid-cols-2 gap-4">

    <input
        type="text"
        name="name"
        placeholder="Trip Name"
        class="border rounded-lg p-3 w-full"
        required
    >

    <input
        type="number"
        name="price"
        placeholder="Price"
        class="border rounded-lg p-3 w-full"
        required
    >

</div>

<div class="mt-4">
    <input
        type="file"
        name="image"
        class="border rounded-lg p-3 w-full"
    >
</div>

    <div class="mt-4">
    <label class="block mb-2 font-medium">
        Trip Date
    </label>

    <input
        type="date"
        name="trip_date"
        class="border rounded-lg p-3 w-full"
        required
    >
</div>

<button
    type="submit"
    class="mt-5 inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-xl shadow-lg hover:scale-105 hover:shadow-xl transition duration-300"
>
     Add Trip
</button>



</form>

</div>






        
          </div>







<div class="bg-white rounded-xl shadow-lg overflow-hidden">

    <div class="p-5 border-b">

        <form method="GET" action="{{ route('dashboard') }}" class="mb-4">

            <div class="flex gap-3">

                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? '' }}"
                    placeholder="Search by trip name..."
                    class="border border-gray-300 rounded-xl p-3 w-full"
                >

              <button
    type="submit"
    class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 rounded-xl shadow-lg hover:scale-105 transition duration-300">
     Search
</button>

            </div>

        </form>

     <div class="flex justify-between items-center">

    <h3 class="text-2xl font-bold text-gray-800">
        🌍 Trips List
    </h3>

    <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-semibold">
        {{ $tripsCount }} Trips
    </span>

</div>



    </div>

    <table class="w-full">

<thead class="bg-gradient-to-r from-blue-600 to-green-500 text-white">
<tr>
    <th class="p-4 text-left font-semibold">Trip Name</th>
    <th class="p-4 text-left font-semibold">Price</th>
    <th class="p-4 text-left font-semibold">Date</th>
    <th class="p-4 text-left font-semibold">Max Seats</th>
    <th class="p-4 text-left font-semibold">Booked</th>
    <th class="p-4 text-left font-semibold">Remaining</th>
    <th class="p-4 text-left font-semibold">Actions</th>
</tr>
</thead>

    <tbody>

    @foreach($trips as $trip)

     <tr class="border-b hover:bg-blue-50 transition duration-300">


@php
    $booked = $trip->bookings->sum('persons');
    $remaining = $trip->max_persons - $booked;
@endphp

           <td class="p-4">
    <div class="flex items-center gap-3">

        @if($trip->image)
            <img src="{{ asset('storage/'.$trip->image) }}"
                 class="w-14 h-14 rounded-xl object-cover shadow">
        @endif

        <div>
            <p class="font-bold text-gray-800">
                {{ $trip->name }}
            </p>
            <p class="text-sm text-gray-500">
                {{ $trip->price }} EGP
            </p>
        </div>

    </div>
</td>



            <td class="p-4">
                {{ $trip->price }} EGP
            </td>


            <td class="p-4">
    {{ \Carbon\Carbon::parse($trip->trip_date)->format('d-m-Y') }}
</td>

<td class="p-4">
    {{ $trip->max_persons }}
</td>

<td class="p-4">
    {{ $booked }}
</td>

<td class="p-4">
    @if($remaining > 0)
        <span class="text-green-600 font-bold">
            {{ $remaining }}
        </span>
    @else
        <span class="text-red-600 font-bold">
            Fully Booked
        </span>
    @endif
</td>





            <td class="p-4 flex gap-3">

              <a href="{{ route('trips.edit', $trip->id) }}"
class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-xl shadow hover:bg-blue-700 hover:scale-105 transition duration-300">
     Edit
</a>

                <form action="{{ route('trips.destroy', $trip->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                 <button
type="submit"
class="inline-flex items-center gap-2 bg-red-600 text-white px-4 py-2 rounded-xl shadow hover:bg-red-700 hover:scale-105 transition duration-300">
     Delete
</button>
                </form>
                

<a href="{{ route('trip.bookings', $trip->id) }}"
class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-4 py-2 rounded-xl shadow-lg hover:scale-105 transition duration-300">
     View Bookings
</a>

            </td>

        </tr>

    @endforeach

    </tbody>

</table>




<div class="bg-white rounded-xl shadow-lg p-6 mt-8">

    <h3 class="text-xl font-bold mb-4">
        Recent Bookings
    </h3>

    <table class="w-full">

        <thead class="bg-gray-100">

  <tr>
    <th class="p-3 text-left">Trip</th>
    <th class="p-3 text-left">Price / Person</th>
    <th class="p-3 text-left">Persons</th>
    <th class="p-3 text-left">Total</th>
    <th class="p-3 text-left">Booking Date</th>
    <th class="p-3 text-left">Status</th>
</tr>

        </thead>

        <tbody>

        @foreach($bookings as $booking)

            <tr class="border-b">


<td class="p-3">
    {{ $booking->trip->name }}
</td>


                <td class="p-3">
    {{ $booking->trip->price }} EGP
</td>

<td class="p-3">
    {{ $booking->persons }}
</td>

<td class="p-3 font-bold text-green-600">
    {{ $booking->trip->price * $booking->persons }} EGP
</td>

<td class="p-3">
    {{ $booking->created_at->format('d-m-Y') }}
</td>

<td class="p-3">

    <form action="{{ route('bookings.status', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <select
            name="status"
            onchange="this.form.submit()"
            class="border rounded-lg px-3 py-2">

            <option value="Pending"
                {{ $booking->status == 'Pending' ? 'selected' : '' }}>
                🟡 Pending
            </option>

            <option value="Confirmed"
                {{ $booking->status == 'Confirmed' ? 'selected' : '' }}>
                🟢 Confirmed
            </option>

            <option value="Cancelled"
                {{ $booking->status == 'Cancelled' ? 'selected' : '' }}>
                🔴 Cancelled
            </option>

        </select>
    </form>

</td>

            </tr>










        @endforeach

        </tbody>

    </table>

</div>





</div>




                </div>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="bg-white rounded-xl shadow-lg p-6 mt-8">

    <h2 class="text-xl font-bold mb-4">
        Bookings Per Trip
    </h2>

    <canvas id="bookingChart"></canvas>

</div>

<script>
const ctx = document.getElementById('bookingChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($tripNames),
        datasets: [{
            label: 'Booked Persons',
            data: @json($tripBookings),
            borderWidth: 1
        }]
    },

    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>


<div class="bg-white rounded-xl shadow-lg p-6 mt-8">

    <h2 class="text-xl font-bold mb-4">
        Booking Status
    </h2>

    <canvas id="statusChart"></canvas>

</div>

<script>
const statusCtx = document.getElementById('statusChart');

new Chart(statusCtx, {
    type: 'pie',

    data: {
        labels: ['Pending', 'Confirmed', 'Cancelled'],

        datasets: [{
            data: [
                {{ $pending }},
                {{ $confirmed }},
                {{ $cancelled }}
            ],

            backgroundColor: [
                '#facc15',
                '#22c55e',
                '#ef4444'
            ]
        }]
    },

    options: {
        responsive: true
    }
});
</script>



<footer class="mt-12 bg-gradient-to-r from-blue-700 to-green-600 text-white rounded-t-3xl shadow-lg">

    <div class="max-w-7xl mx-auto px-8 py-8">

        <div class="grid md:grid-cols-3 gap-8">

            <div>
                <h2 class="text-2xl font-bold mb-3">
                    🌍 Travel Agency
                </h2>

                <p class="text-blue-100">
                    Smart Travel Management System for managing trips,
                    bookings and customers easily.
                </p>
            </div>

            <div>
                <h3 class="font-bold mb-3">
                    Quick Links
                </h3>

                <ul class="space-y-2 text-blue-100">
                    <li>🏠 Dashboard</li>
                    <li>✈ Trips</li>
                    <li>📅 Bookings</li>
                    <li>👥 Users</li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold mb-3">
                    Contact
                </h3>

                <p>📧 travelagency@gmail.com</p>
                <p>📞 +20 100 000 0000</p>
                <p>📍 Alexandria, Egypt</p>
            </div>

        </div>

        <hr class="my-6 border-white/20">

        <div class="text-center text-blue-100">

            © 2026 Travel Agency Portal | Graduation Project

        </div>

    </div>

</footer>


</x-app-layout>