<?php

namespace DanBaker\ToolBox\Traits\Env;

trait IsProduction
{
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