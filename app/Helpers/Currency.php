<?php

namespace App\Helpers;

class Currency
{
    public static function formatCurrency($amount, $currency)
    {

        $formatter = new \NumberFormatter(config('app.locale'), \NumberFormatter::CURRENCY);
        if ($currency == null) {
            $currency = config('app.currency', 'USD'); //if there is no defined config app.currency it will be USD not null
        }
        return $formatter->formatCurrency($amount, $currency);

    }
}
