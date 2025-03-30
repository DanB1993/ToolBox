<?php

namespace DanBaker\ToolBox\Traits\String;

trait Truncate
{
    /**
     * Truncate a string to a given length with an optional suffix.
     *
     * @param string $value
     * @param int $limit
     * @param string $suffix
     * @return string
     */
    public static function truncate(string $value, int $limit = 100, string $suffix = '...'): string
    {
        if (mb_strlen($value) <= $limit) {
            return $value;
        }

        return mb_substr($value, 0, $limit - mb_strlen($suffix)) . $suffix;
    }
}