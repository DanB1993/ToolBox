<?php

namespace DanBaker\ToolBox\Helpers;

class EnvironmentHelper
{
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