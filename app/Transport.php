<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $appends = array('hours_array');

    public function getHoursArrayAttribute()
    {
        if ($this->hours) {
            return explode(',', $this->hours);
        }

        return [];
    }
}
