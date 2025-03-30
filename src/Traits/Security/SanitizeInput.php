<?php

namespace DanBaker\ToolBox\Traits\Security;

trait SanitizeInput
{
    /**
     * Sanitize a string input by removing potentially malicious content.
     *
     * @param string $input
     * @return string
     */
    public static function sanitizeInput(string $input): string
    {
        // Remove HTML tags and encode special characters
        return filter_var(strip_tags($input), FILTER_SANITIZE_SPECIAL_CHARS);
    }
}