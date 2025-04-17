<?php

namespace DanBaker\ToolBox\Traits\Validate;

trait IsJson
{
    /**
     * Check if a string is valid JSON.
     *
     * This method uses strict JSON parsing and will return false on empty strings or syntax errors.
     *
     * @param string $value The JSON string to validate.
     * @return bool True if valid JSON, false otherwise.
     */
    public static function isJson(string $value): bool
    {
        if (trim($value) === '') {
            return false;
        }

        try {
            json_decode($value, true, 512, JSON_THROW_ON_ERROR);
            return true;
        } catch (\JsonException $e) {
            return false;
        }
    }
}
