<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Mail\BookingConfirmedMail;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    

public function invoice(Booking $booking)
{
 if (
    $booking->user_id != auth()->id()
    && auth()->user()->email != 'nada2@gmail.com'
) {
    abort(403);
}

    $pdf = Pdf::loadView('invoice', compact('booking'));

    return $pdf->download('Invoice-'.$booking->id.'.pdf');
}


public function updateStatus(Request $request, Booking $booking)
{
    $booking->update([
        'status' => $request->status,
    ]);

    if ($booking->status == 'Confirmed') {
        Mail::to($booking->user->email)
            ->send(new BookingConfirmedMail($booking));
    }

    return back()->with('success', 'Booking status updated successfully.');
}

public function store(Request $request, $tripId)
{


$trip = \App\Models\Trip::findOrFail($tripId);

$bookedPersons = $trip->bookings()->sum('persons');

if ($bookedPersons + $request->persons > $trip->max_persons) {
    return back()->with('error', 'Sorry, there are not enough available seats.');
}


$trip = \App\Models\Trip::with('bookings')->findOrFail($tripId);

$booked = $trip->bookings->sum('persons');
$remaining = $trip->max_persons - $booked;

if ($request->persons > $remaining) {
    return back()->with('error',
        "Only {$remaining} seat(s) available for this trip."
    );
}

\App\Models\Booking::create([
    'user_id' => auth()->id(),
    'trip_id' => $tripId,
    'persons' => $request->persons,
    'status' => 'Pending',
]);


    return redirect()->route('bookings.index')
    ->with('success', 'Your booking has been confirmed!');
}



public function destroy($id)
{
    $booking = \App\Models\Booking::findOrFail($id);

    if ($booking->user_id != auth()->id()) {
        abort(403);
    }

    $booking->delete();

    return back()->with('success', 'Booking cancelled successfully!');
}



public function index()
{
    $bookings = \App\Models\Booking::where('user_id', auth()->id())
        ->with('trip')
        ->latest()
        ->get();

    return view('bookings.index', compact('bookings'));
}


}
