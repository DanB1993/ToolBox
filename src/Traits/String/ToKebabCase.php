<?php

namespace DanBaker\ToolBox\Traits\String;

trait ToKebabCase
{
    /**
     * Convert a given string to kebab-case.
     *
     * @param string $string
     * @return string
     */
    public static function toKebabCase(string $string): string
    {
        // Replace all non-alphanumeric characters with spaces
        $string = preg_replace('/[^\p{L}\p{N}]+/u', ' ', $string);

        // Insert spaces between lowercase-uppercase, letter-number transitions
        $string = preg_replace('/([a-z0-9])([A-Z])/', '$1 $2', $string);
        $string = preg_replace('/([a-zA-Z])(\d)/', '$1 $2', $string);
        $string = preg_replace('/(\d)([a-zA-Z])/', '$1 $2', $string);

        // Convert spaces to hyphens and return lowercase
        return strtolower(preg_replace('/\s+/', '-', trim($string)));
    }
}