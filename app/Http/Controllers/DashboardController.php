<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return view('dashboard', compact('trips'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
    'name' => 'required|string|max:255',
    'price' => 'required|numeric',
                                           ]);

        Trip::create($validated);

        return redirect()->back()->with('success', 'Trip added successfully!');
    }


public function edit($id)
{
    $trip = Trip::findOrFail($id);
    return view('edit-trip', compact('trip')); // هنحتاج نعمل الصفحة دي
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



}