<?php

namespace Base\Processor\ProccesorCalculators;

class ProccesorCalculator
{
    public static function log_currency_rate($amount_fixed, $is_card_in_europe_zone)
    {
        echo floor(($amount_fixed * ($is_card_in_eu ? 0.01 : 0.02)) * 100) / 100;
    }

    public static function calculate_rate($currency, $currency_rate, $amount)
    {
        if ($currency == 'EUR' || $currency_rate == 0) {
            $amount_fixed = $amount;
        }
        if ($currency != 'EUR' || $currency_rate > 0) {
            $amount_fixed = $amount / $currency_rate;
        }
        return $amount_fixed;
    }
}