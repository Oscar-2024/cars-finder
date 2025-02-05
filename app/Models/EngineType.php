<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class EngineType extends Base\EngineType
{
    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
