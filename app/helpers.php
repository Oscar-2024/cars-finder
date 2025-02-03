<?php

use Illuminate\Support\Number;

if (! function_exists('formatCurrency')) {
    function formatCurrency(int|float $value, string $currency = 'EUR'): false|string
    {
        return Number::currency($value, in: $currency, locale: config('app.locale'));
    }
}

if (! function_exists('formatNumber')) {
    function formatNumber(int|float $value): false|string
    {
        return Number::format($value, locale: config('app.locale'));
    }
}
