<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
   protected $fillable = [
    'name',
    'price',
    'image',
    'max_persons',
    'trip_date',
];

    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class);
    }

    public function reviews()
{
    return $this->hasMany(\App\Models\Review::class);
}
}