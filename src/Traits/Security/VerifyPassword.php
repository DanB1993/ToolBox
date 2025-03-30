<?php

namespace DanBaker\ToolBox\Traits\Security;

trait VerifyPassword
{
    /**
     * Verify a password against a given hash.
     *
     * @param string $password
     * @param string $hash
     * @return bool
     */
    public static function verifyPassword(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}