<?php

namespace DanBaker\ToolBox\Traits\Environment;

trait IsDevelopment
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