<?php

namespace DanBaker\ToolBox\Traits\Security;

trait IsUuid
{
    /**
     * Check if a string is a valid UUID (v1–v5).
     *
     * @param string $value
     * @return bool
     */
    public static function isUuid(string $value): bool
    {
        return (bool) preg_match(
            '/^[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i',
            $value
        );
    }
}