<?php

namespace DanBaker\ToolBox\Traits\String;

trait MaskString
{
    /**
     * Mask part of a string with a repeated character (default: *).
     *
     * @param string $value
     * @param int $visibleStart
     * @param int $visibleEnd
     * @param string $maskChar
     * @return string
     */
    public static function maskString(string $value, int $visibleStart = 0, int $visibleEnd = 0, string $maskChar = '*'): string
    {
        $length = mb_strlen($value);

        if ($visibleStart + $visibleEnd >= $length) {
            return $value; // nothing to mask
        }

        $start = mb_substr($value, 0, $visibleStart);
        $end = $visibleEnd > 0 ? mb_substr($value, -$visibleEnd) : '';
        $maskedLength = $length - ($visibleStart + $visibleEnd);
        $masked = str_repeat($maskChar, $maskedLength);

        return $start . $masked . $end;
    }
}