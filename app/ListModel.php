<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListModel extends Model
{
    protected $table = 'lists';
    protected $fillable = ['name', 'price', 'isOnSale', 'city_id', 'developer_id'];

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function scopeIsOnSale($query, $value)
    {
        return $query->where('isOnSale', $value);
    }

    public function scopePriceLessThan($query, $value)
    {
        return $query->where('price', '<', $value);
    }
}
