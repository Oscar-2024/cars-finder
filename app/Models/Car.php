<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Car extends Base\Car
{
    public function engineType(): BelongsTo
    {
        return $this->belongsTo(EngineType::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }

    public function dealership(): BelongsTo
    {
        return $this->belongsTo(Dealership::class);
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class);
    }
}
