<?php

namespace DanBaker\ToolBox\Traits\Number;

trait Percentage
{
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
}