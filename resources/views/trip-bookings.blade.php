<x-app-layout>

    <div class="py-12">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <h2 class="text-2xl font-bold mb-6">
                    Bookings for {{ $trip->name }}
                </h2>

                <table class="w-full border">

                    <thead class="bg-gray-100">

                        <tr>
                            <th class="p-3">User</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Persons</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Booking Date</th>
                            <th class="p-3">Invoice</th>
                        </tr>

                    </thead>

                    <tbody>

                    @forelse($trip->bookings as $booking)

                        <tr class="border-b">

                            <td class="p-3">
                                {{ $booking->user->name }}
                            </td>

                            <td class="p-3">
                                {{ $booking->user->email }}
                            </td>

                            <td class="p-3">
                                {{ $booking->persons }}
                            </td>

                            <td class="p-3">
                                {{ $booking->status }}
                            </td>

                            <td class="p-3">
                                {{ $booking->created_at->format('d-m-Y') }}
                            </td>

                            <td class="p-3">
                                <a href="{{ route('bookings.invoice', $booking->id) }}"
                                   class="bg-red-600 text-white px-3 py-2 rounded hover:bg-red-700">
                                    Download PDF
                                </a>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center p-4">
                                No bookings yet.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

                <a href="{{ route('dashboard') }}"
                   class="mt-6 inline-block bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                    Back
                </a>

            </div>

        </div>

    </div>

</x-app-layout>