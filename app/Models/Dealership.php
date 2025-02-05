<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dealership extends Base\Dealership
{
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
