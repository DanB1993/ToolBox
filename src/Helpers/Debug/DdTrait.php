<?php

namespace DanBaker\ToolBox\Helpers\Debug;

trait DdTrait
{
    /**
     * Dump the variable content and terminate execution.
     *
     * @param mixed ...$variables
     * @return void
     */
    public static function dd(mixed ...$variables): void
    {
        foreach ($variables as $variable) {
            var_dump($variable);
        }

        exit(1);
    }
}