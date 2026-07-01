<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripPublicController extends Controller
{
 public function index()
{
    $trips = \App\Models\Trip::with([
        'bookings',
        'reviews.user'
    ])
    ->withAvg('reviews', 'rating')
    ->get();

    return view('trips.index', compact('trips'));
}
}
