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

    /**
     * Check if a string is valid JSON.
     *
     * @param string $value
     * @return bool
     */
    public static function isJson(string $value): bool
    {
        if (!is_string($value) || trim($value) === '') {
            return false;
        }

        json_decode($value);

        return json_last_error() === JSON_ERROR_NONE;
    }
}