<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
