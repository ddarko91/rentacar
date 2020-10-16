<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $fillable = array('city', 'email', 'address', 'phone');

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
