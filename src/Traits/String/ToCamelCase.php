<?php

namespace DanBaker\ToolBox\Traits\String;

trait ToCamelCase
{
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