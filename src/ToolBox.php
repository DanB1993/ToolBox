<?php

namespace DanBaker\ToolBox;

class ToolBox
{
    public static function __callStatic(string $name, array $arguments)
    {
        $class = 'DanBaker\\ToolBox\\Services\\' . ucfirst($name) . 'Tools';

        if (class_exists($class)) {
            return new $class(...$arguments);
        }

        throw new \BadMethodCallException("Undefined ToolBox service: {$name}");
    }
}
