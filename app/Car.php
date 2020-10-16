<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{   
    
    protected $fillable = array('locations_id', 'brand', 'model', 'year', 'fuel', 'price');

    public function locations()
    {
        return $this->belongsTo(Locations::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
