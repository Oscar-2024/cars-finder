<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    public $fillable = ['name'];
}
