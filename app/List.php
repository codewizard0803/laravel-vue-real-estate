<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListModel extends Model
{
    protected $table = 'lists';

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
