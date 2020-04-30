<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_destination',
        'from_latlong',
        'to_destination',
        'to_latlong',
        'date',
        'time',
        'no_of_people',
        'distance',
        'user_id',
        'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
