<?php

namespace DanBaker\ToolBox\Traits\Security;

trait IsIpAddress
{
    /**
     * Check if a string is a valid IPv4 or IPv6 address.
     *
     * @param string $value
     * @return bool
     */
    public static function isIpAddress(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_IP) !== false;
    }
}