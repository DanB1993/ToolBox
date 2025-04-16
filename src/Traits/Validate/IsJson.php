<?php

namespace DanBaker\ToolBox\Traits\Validate;

trait IsJson
{
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