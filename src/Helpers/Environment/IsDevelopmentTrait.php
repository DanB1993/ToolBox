<?php

namespace DanBaker\ToolBox\Helpers\Environment;

trait IsDevelopmentTrait
{
    /**
     * Check if the current environment is 'development'.
     *
     * @return bool
     */
    public static function isDevelopment(): bool
    {
        return getenv('APP_ENV') === 'development';
    }
}