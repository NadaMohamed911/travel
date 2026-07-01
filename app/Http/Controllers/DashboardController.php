<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{




public function index(Request $request)
{

if (auth()->user()->email != 'nada2@gmail.com') {
    abort(403);
}



    $search = $request->search;

 $trips = Trip::with('bookings')
    ->when($search, function ($query) use ($search) {
        $query->where('name', 'like', "%{$search}%");
    })
    ->get();


$tripsCount = Trip::count();

$bookings = \App\Models\Booking::with(['user', 'trip'])->latest()->get();

$bookingsCount = \App\Models\Booking::count();


$revenue = \App\Models\Booking::with('trip')
    ->get()
    ->sum(function ($booking) {
        return $booking->trip->price * $booking->persons;
    });


    $tripNames = $trips->pluck('name');

$tripBookings = $trips->map(function ($trip) {
    return $trip->bookings->sum('persons');
});


$pending = \App\Models\Booking::where('status', 'Pending')->count();

$confirmed = \App\Models\Booking::where('status', 'Confirmed')->count();

$cancelled = \App\Models\Booking::where('status', 'Cancelled')->count();

$usersCount = User::count();


return view('dashboard', compact(
    'trips',
    'tripsCount',
    'bookings',
    'bookingsCount',
    'usersCount',
    'revenue',
    'tripNames',
    'tripBookings',
    'pending',
    'confirmed',
    'cancelled',
    'search'
));
}





    public function store(Request $request)
    {
       


$validated = $request->validate([
    'name' => 'required|string|max:255',
    'price' => 'required|numeric',
    'max_persons' => 'required|integer|min:1',
    'trip_date' => 'required|date',
    'image' => 'nullable',
]);


if ($request->hasFile('image')) {
    $validated['image'] = $request->file('image')->store('trips', 'public');
}

Trip::create($validated);

return redirect()->back()->with('success', 'Trip added successfully!');



    }


public function edit($id)
{
    $trip = Trip::findOrFail($id);
    return view('edit-trip', compact('trip')); 
}

public function update(Request $request, $id)
{
    $trip = Trip::findOrFail($id);
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
    ]);
    
    $trip->update($validated);
    return redirect('/dashboard')->with('success', 'Trip updated successfully!');
}

public function tripBookings(Trip $trip)
{
    $trip->load('bookings.user');

    return view('trip-bookings', compact('trip'));
}

}