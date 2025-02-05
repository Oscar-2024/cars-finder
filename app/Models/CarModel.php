<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarModel extends Base\CarModel
{
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
