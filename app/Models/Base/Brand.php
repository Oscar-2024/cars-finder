<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    const TOYOTA = 1;
    const FORD = 2;
    const CHEVROLET = 3;
    const NISSAN = 4;
    const HONDA = 5;
    const VOLKSWAGEN = 6;
    const HYUNDAI = 7;
    const MERCEDES_BENZ = 8;
    const BMW = 9;
    const AUDI = 10;
}
