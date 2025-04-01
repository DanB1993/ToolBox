<?php

namespace DanBaker\ToolBox\Traits\Format;

trait PhoneNumber
{
    /**
     * Format a UK phone number to the standard pattern.
     * E.g. +447123456789 -> 07123 456789
     *
     * @param string $number
     * @return string
     */
    public static function phoneNumber(string $number): string
    {
        // Remove non-numeric characters
        $cleaned = preg_replace('/\D+/', '', $number);

        // Convert +44 to 0 if applicable
        if (str_starts_with($cleaned, '44')) {
            $cleaned = '0' . substr($cleaned, 2);
        }

        // Format known UK mobile patterns (07123 456789)
        if (preg_match('/^(07\d{3})(\d{6})$/', $cleaned, $matches)) {
            return $matches[1] . ' ' . $matches[2];
        }

        // Fallback - just return the cleaned number
        return $cleaned;
    }
}