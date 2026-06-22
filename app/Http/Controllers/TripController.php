<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    // دالة لعرض الرحلات السياحية للعميل
    public function index()
    {
        $trips = Trip::all(); 
        return "<h1>Welcome to Travel Agency Portal: Available Tour Packages & Trips will be displayed here soon! ✈️🌍</h1>";
    }


    public function destroy($id)
{
    $trip = \App\Models\Trip::findOrFail($id);
    $trip->delete();
    return redirect()->back()->with('success', 'Trip deleted successfully!');
}
}