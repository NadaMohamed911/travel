<h2>Booking Confirmed 🎉</h2>

<p>Hello {{ $booking->user->name }},</p>

<p>Your booking has been confirmed.</p>

<hr>

<p><strong>Trip:</strong> {{ $booking->trip->name }}</p>

<p><strong>Date:</strong> {{ \Carbon\Carbon::parse($booking->trip->trip_date)->format('d-m-Y') }}</p>

<p><strong>Persons:</strong> {{ $booking->persons }}</p>

<p><strong>Total:</strong>
{{ $booking->trip->price * $booking->persons }} EGP
</p>

<hr>

<p>Thank you for choosing our Travel Agency ❤️</p>