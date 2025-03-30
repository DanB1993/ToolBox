<?php

namespace DanBaker\ToolBox\Traits\String;

trait Slugify
{
    /**
     * Convert a string into a URL-friendly slug.
     *
     * @param string $string
     * @param string $separator
     * @return string
     */
    public static function slugify(string $string, string $separator = '-'): string
    {
        // Convert to UTF-8 and normalize
        if (class_exists('Normalizer')) {
            $string = \Normalizer::normalize($string, \Normalizer::FORM_D);
        }

        // Strip accents
        $string = preg_replace('/[\p{Mn}]/u', '', $string);

        // Transliterate (still fallback)
        $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);

        // Replace non-alphanumeric with separator
        $string = preg_replace('/[^a-zA-Z0-9]+/', $separator, $string);

        // Lowercase + trim
        return trim(strtolower($string), $separator);
    }
}