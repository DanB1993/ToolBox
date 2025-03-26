<?php

namespace DanBaker\ToolBox\Helpers;

class EnvironmentHelper
{
    /**
     * Get an environment variable with optional default value and type casting.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function getEnv(string $key, mixed $default = null): mixed
    {
        $value = getenv($key);

        if ($value === false) {
            return $default;
        }

        $lower = strtolower($value);

        return match ($lower) {
            'true', '(true)'   => true,
            'false', '(false)' => false,
            'null', '(null)'   => null,
            'empty', '(empty)' => '',
            default            => $value,
        };
    }

    /**
     * Check if the current environment is 'testing'.
     *
     * @return bool
     */
    public static function isTesting(): bool
    {
        return getenv('APP_ENV') === 'testing';
    }

    /**
     * Check if the current environment is 'development'.
     *
     * @return bool
     */
    public static function isDevelopment(): bool
    {
        return getenv('APP_ENV') === 'development';
    }

    /**
     * Check if the current environment is 'production'.
     *
     * @return bool
     */
    public static function isProduction(): bool
    {
        return getenv('APP_ENV') === 'production';
    }
}