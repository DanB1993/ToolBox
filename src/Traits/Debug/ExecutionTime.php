<?php

namespace DanBaker\ToolBox\Traits\Debug;

trait ExecutionTime
{
    /**
     * Measure execution time of a callable in milliseconds.
     *
     * @param callable $callback
     * @return float Execution time in milliseconds.
     */
    public static function executionTime(callable $callback): float
    {
        $startTime = microtime(true);

        $callback();

        $endTime = microtime(true);

        return round(($endTime - $startTime) * 1000, 4);
    }
}