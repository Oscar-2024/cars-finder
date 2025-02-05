<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Color extends Base\Color
{
    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
