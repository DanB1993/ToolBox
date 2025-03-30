<?php

namespace DanBaker\ToolBox\Traits\Security;

trait HashPassword
{
    /**
     * Hash a password securely.
     *
     * @param string $password
     * @return string
     */
    public static function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}