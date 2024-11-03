<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
