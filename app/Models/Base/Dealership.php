<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Dealership extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'city_id',
        'name',
        'address',
    ];
}
