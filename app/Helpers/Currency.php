<?php

namespace App\Helpers;

class Currency
{
    public function __invoke(...$args)
    {
        return static::format(...$args);
    }
    public static function format($amount, $currency = 'USD')
    {
        $formatter = new \NumberFormatter('en_US', \NumberFormatter::DECIMAL);
        if ($currency == null) {
            $currency = config('app.currency', 'USD');
        }
        return $formatter->formatCurrency($amount, $currency);
    }

}
