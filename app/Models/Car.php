<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'manufacturer_id',
        'model',
        'year_of_production',
        'registration_marks',
        'type_of_exchanger',
        'type_of_fuel',
        'vehicle_class',
        'image',
        'price',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'car_id');
    }



    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function carModel()
    {
        return $this->belongsTo(CarModel::class, 'model');
    }







}
