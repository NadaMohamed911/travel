<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {




        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        $exists = Review::where('user_id', auth()->id())
            ->where('trip_id', $request->trip_id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'You have already reviewed this trip.');
        }




        Review::create([
            'user_id' => auth()->id(),
            'trip_id' => $request->trip_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Review added successfully!');
    }
}