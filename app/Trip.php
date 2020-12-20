<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $guarded = [];

    public function userTripEntities()
    {
        return $this->hasMany(UserTripEntity::class,'trip_id');
    }

    public function userTripTransports()
    {
        return $this->hasMany(UserTripTransport::class,'trip_id');
    }
}
