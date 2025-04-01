<?php

namespace DanBaker\ToolBox\Traits\Env;

trait IsTesting
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
}