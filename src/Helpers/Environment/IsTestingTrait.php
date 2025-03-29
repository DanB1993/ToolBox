<?php

namespace DanBaker\ToolBox\Helpers\Environment;

trait IsTestingTrait
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