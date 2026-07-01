<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  protected $fillable = [
    'user_id',
    'trip_id',
    'persons',
    'status',
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

public function review()
{
    return $this->hasOne(\App\Models\Review::class, 'trip_id', 'trip_id')
        ->where('user_id', $this->user_id);
}

}