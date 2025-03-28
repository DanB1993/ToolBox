<?php

namespace DanBaker\ToolBox\Helpers;

class NumberHelper
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

    /**
     * Calculate the percentage of a number.
     *
     * @param float|int $part
     * @param float|int $whole
     * @param int $precision
     * @return float
     */
    public static function percentage(float|int $part, float|int $whole, int $precision = 2): float
    {
        if ($whole == 0) {
            return 0.0;
        }

        return round(($part / $whole) * 100, $precision);
    }

    /**
     * Convert bytes into a human-readable format.
     *
     * @param int $bytes
     * @param int $precision
     * @return string
     */
    public static function bytesToHumanReadable(int $bytes, int $precision = 2): string
    {
        if ($bytes < 1024) {
            return $bytes . ' B';
        }

        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
        $factor = (int) floor(log($bytes, 1024));

        return sprintf("%.{$precision}f %s", $bytes / (1024 ** $factor), $units[$factor]);
    }
}