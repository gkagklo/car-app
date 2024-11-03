<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

    protected $fillable = [
        'maker_id',
        'model_id',
        'year',
        'price',
        'vin',
        'mileage',
        'car_type_id',
        'fuel_type_id',
        'user_id',
        'state_id',
        'city_id',
        'address',
        'phone',
        'description'
    ];

    public function features()
    {
        return $this->hasOne(CarFeatures::class);
    }

    public function primaryImage()
    {
        return $this->hasOne(CarImages::class)->oldestOfMany('position');
    }

    public function images()
    {
        return $this->hasMany(CarImages::class);
    }

    public function carType()
    {
        return $this->belongsTo(CarType::class);
    }
}
