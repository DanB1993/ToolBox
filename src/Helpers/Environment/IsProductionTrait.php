<?php

namespace DanBaker\ToolBox\Helpers\Environment;

trait IsProductionTrait
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