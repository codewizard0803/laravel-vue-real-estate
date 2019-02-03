<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function scopeCountry($query, $value)
    {
        return $query->where('country', $value);
    }
}
