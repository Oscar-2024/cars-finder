<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Base\City
{
    public function dealerships(): HasMany
    {
        return $this->hasMany(Dealership::class);
    }
}
