<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTripTransport extends Model
{
    protected $table = 'user_trip_transport';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }
}
