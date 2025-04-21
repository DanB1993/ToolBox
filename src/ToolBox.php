<?php

namespace DanBaker\ToolBox;

class ToolBox
{
    public static function __callStatic(string $name, array $arguments)
    {
        $toolsName = ucfirst($name) . 'Tools';
        $class = 'DanBaker\\ToolBox\\Services\\' . $toolsName;

        if (class_exists($class)) {
            return new $class(...$arguments);
        }

        $class = 'DanBaker\\ToolBox\\Clients\\' . $toolsName;

        if (class_exists($class)) {
            return new $class(...$arguments);
        }

        throw new \BadMethodCallException("Undefined ToolBox service: {$name}");
    }
}
