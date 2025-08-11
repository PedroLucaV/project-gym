<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{
    protected $table = 'booking';

    protected $fillable = [
        'booking_date',
        'finished_date',
        'user_id',
        'equipament_id'
    ];

    public function setBookingDateAttribute($value)
    {
        $this->attributes['booking_date'] = $value;

        $date = Carbon::parse($value);
        $this->attributes['finished_date'] = $date->copy()->addMinutes(40);
    }

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
