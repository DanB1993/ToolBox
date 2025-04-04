<?php

namespace DanBaker\ToolBox\Traits\Security;

trait GenerateToken
{
    /**
     * Generate a cryptographically secure random token.
     *
     * @param int $length
     * @return string
     */
    public static function generateToken(int $length = 32): string
    {
        return bin2hex(random_bytes($length / 2));
    }
}