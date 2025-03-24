<?php

namespace DanBaker\ToolBox\Tests\Helpers;

use DanBaker\ToolBox\Helpers\StringHelper;
use PHPUnit\Framework\TestCase;

class StringHelperTest extends TestCase
{
    /** @test */
    public function converts_camel_case_to_snake_case()
    {
        $this->assertEquals('my_variable_name', StringHelper::toSnakeCase('myVariableName'));
    }

    /** @test */
    public function converts_pascal_case_to_snake_case()
    {
        $this->assertEquals('my_variable_name', StringHelper::toSnakeCase('MyVariableName'));
    }

    /** @test */
    public function converts_spaces_to_snake_case()
    {
        $this->assertEquals('my_variable_name', StringHelper::toSnakeCase('My Variable Name'));
    }

    /** @test */
    public function handles_mixed_strings()
    {
        $this->assertEquals('my_variable_123_name', StringHelper::toSnakeCase('MyVariable123Name'));
        $this->assertEquals('hello_world', StringHelper::toSnakeCase('hello-world'));
        $this->assertEquals('test_string', StringHelper::toSnakeCase('test__string'));
    }
}