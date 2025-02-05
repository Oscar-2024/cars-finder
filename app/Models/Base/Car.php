<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'engine_type_id',
        'car_model_id',
        'dealership_id',
        'color_id',
        'year',
        'price',
        'kilometers',
    ];
}
