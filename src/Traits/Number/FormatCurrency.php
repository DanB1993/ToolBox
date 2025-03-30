<?php

namespace DanBaker\ToolBox\Traits\Number;

trait FormatCurrency
{
    /**
     * Format a number as a currency string.
     *
     * @param float|int $number
     * @param string $symbol
     * @param int $decimalPlaces
     * @param string $decimalSeparator
     * @param string $thousandSeparator
     * @return string
     */
    public static function formatCurrency(
        float|int $number,
        string $symbol = '£',
        int $decimalPlaces = 2,
        string $decimalSeparator = '.',
        string $thousandSeparator = ','
    ): string {
        return $symbol . number_format($number, $decimalPlaces, $decimalSeparator, $thousandSeparator);
    }
}