<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Feature extends Base\Feature
{
    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class);
    }
}
