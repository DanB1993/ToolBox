<?php

namespace DanBaker\ToolBox\Helpers;

class ValidationHelper
{
    /**
     * Check if a string contains only alphanumeric characters (a–z, A–Z, 0–9).
     *
     * @param string $value
     * @return bool
     */
    public static function isAlphaNumeric(string $value): bool
    {
        return ctype_alnum($value);
    }
}