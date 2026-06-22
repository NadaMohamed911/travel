<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripPublicController extends Controller
{
    public function index()
{
    $trips = \App\Models\Trip::all();


   return view('trips.index', compact('trips'));
}
}
