<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'brand_id',
        'name'
    ];
}
