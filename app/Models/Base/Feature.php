<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
}
