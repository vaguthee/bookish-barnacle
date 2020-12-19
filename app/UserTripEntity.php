<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTripEntity extends Model
{
    protected $table = 'user_trip_entity';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }
}
