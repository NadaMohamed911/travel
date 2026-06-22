<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    

public function store(Request $request, $tripId)
{
    \App\Models\Booking::create([
        'user_id' => auth()->id(),
        'trip_id' => $tripId,
    ]);
    return back()->with('success', 'تم الحجز بنجاح!');
}


}
