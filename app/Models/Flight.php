<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    public function arrivalAirport()
    {
        return $this->hasOne(Airport::class, 'id', 'arrival_airport_id');
    }

    public function departureAirport()
    {
        return $this->hasOne(Airport::class, 'id', 'departure_airport_id');
    }
}
