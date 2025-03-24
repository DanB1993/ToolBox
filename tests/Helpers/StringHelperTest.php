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

    /** @test */
    public function converts_snake_case_to_camel_case()
    {
        $this->assertEquals('myVariableName', StringHelper::toCamelCase('my_variable_name'));
    }

    /** @test */
    public function converts_kebab_case_to_camel_case()
    {
        $this->assertEquals('myVariableName', StringHelper::toCamelCase('my-variable-name'));
    }

    /** @test */
    public function converts_spaces_to_camel_case()
    {
        $this->assertEquals('myVariableName', StringHelper::toCamelCase('my variable name'));
    }

    /** @test */
    public function handles_mixed_and_special_characters()
    {
        $this->assertEquals('helloWorld123', StringHelper::toCamelCase('Hello World 123'));
        $this->assertEquals('testString', StringHelper::toCamelCase('test__string'));
        $this->assertEquals('myVariable123Name', StringHelper::toCamelCase('MyVariable_123-name'));
    }
}