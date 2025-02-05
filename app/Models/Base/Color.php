<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];
}
