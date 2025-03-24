<?php

namespace DanBaker\ToolBox\Helpers;

class StringHelper
{
    /**
     * Convert a given string to snake_case.
     *
     * @param string $string
     * @return string
     */
    public static function toSnakeCase(string $string): string
    {
        // Replace all non-alphanumeric characters with underscores
        $string = preg_replace('/[^\w]+/', '_', $string);

        // Add underscore between lowercase/number and uppercase letters
        $string = preg_replace('/([a-z0-9])([A-Z])/', '$1_$2', $string);

        // Add underscore between letters followed by numbers
        $string = preg_replace('/([a-zA-Z])(\d)/', '$1_$2', $string);

        // Add underscore between numbers followed by letters
        $string = preg_replace('/(\d)([a-zA-Z])/', '$1_$2', $string);

        // Collapse multiple underscores to single underscore
        $string = preg_replace('/_+/', '_', $string);

        return strtolower(trim($string, '_'));
    }

    /**
     * Convert a given string to camelCase.
     *
     * @param string $string
     * @return string
     */
    public static function toCamelCase(string $string): string
    {
        // Replace underscores, hyphens, and special chars with spaces
        $string = preg_replace('/[^\p{L}\p{N}]+/u', ' ', $string);

        // Insert spaces between lowercase and uppercase letters
        $string = preg_replace('/([a-z0-9])([A-Z])/', '$1 $2', $string);

        // Insert spaces between letters and numbers
        $string = preg_replace('/([a-zA-Z])(\d)/', '$1 $2', $string);
        $string = preg_replace('/(\d)([a-zA-Z])/', '$1 $2', $string);

        // Capitalize words, remove spaces, lowercase first char
        $string = str_replace(' ', '', ucwords(strtolower(trim($string))));

        return lcfirst($string);
    }
}