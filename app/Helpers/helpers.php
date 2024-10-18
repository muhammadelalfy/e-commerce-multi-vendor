<?php


if (!function_exists('format_money')) {
    function format_money($amount, $currency = 'USD', $locale = 'en_US')
    {
        $formatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($amount, $currency);
    }
}
