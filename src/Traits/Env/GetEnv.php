<?php

namespace DanBaker\ToolBox\Traits\Env;

trait GetEnv
{
    /**
     * Get an environment variable with optional default value and type casting.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function getEnv(string $key, mixed $default = null): mixed
    {
        $value = getenv($key);

        if ($value === false) {
            return $default;
        }

        $lower = strtolower($value);

        return match ($lower) {
            'true', '(true)'   => true,
            'false', '(false)' => false,
            'null', '(null)'   => null,
            'empty', '(empty)' => '',
            default            => $value,
        };
    }
}