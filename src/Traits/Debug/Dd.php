<?php

namespace DanBaker\ToolBox\Traits\Debug;

trait Dd
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