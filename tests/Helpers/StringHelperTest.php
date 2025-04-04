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

    /** @test */
    public function converts_strings_to_kebab_case()
    {
        $this->assertEquals('my-variable-name', StringHelper::toKebabCase('MyVariableName'));
        $this->assertEquals('hello-world', StringHelper::toKebabCase('helloWorld'));
        $this->assertEquals('hello-world-123', StringHelper::toKebabCase('Hello World 123'));
        $this->assertEquals('test-string', StringHelper::toKebabCase('test__string'));
        $this->assertEquals('my-variable-123-name', StringHelper::toKebabCase('MyVariable_123-name'));
    }

    /** @test */
    public function truncates_strings_properly()
    {
        $this->assertEquals('Hello...', StringHelper::truncate('Hello World', 8));
        $this->assertEquals('Hello World', StringHelper::truncate('Hello World', 20));
        $this->assertEquals('DanB...', StringHelper::truncate('DanBakerToolBox', 7));
        $this->assertEquals('Dan!', StringHelper::truncate('DanBaker', 4, '!'));
    }

    /** @test */
    public function pluralize_strings()
    {
        $this->assertEquals('cats', StringHelper::pluralize('cat', 2));
        $this->assertEquals('box', StringHelper::pluralize('box', 1));
        $this->assertEquals('boxes', StringHelper::pluralize('box', 5));
        $this->assertEquals('babies', StringHelper::pluralize('baby', 3));
        $this->assertEquals('toys', StringHelper::pluralize('toy', 7));
    }

    /** @test */
    public function it_singularizes_basic_english_words()
    {
        $this->assertEquals('cat', StringHelper::singularize('cats'));
        $this->assertEquals('box', StringHelper::singularize('boxes'));
        $this->assertEquals('baby', StringHelper::singularize('babies'));
        $this->assertEquals('church', StringHelper::singularize('churches'));
        $this->assertEquals('status', StringHelper::singularize('status')); // shouldn't change
    }
    
    /** @test */
    public function slugify_strings()
    {
        $this->assertEquals('hello-world', StringHelper::slugify('Hello World'));
        $this->assertEquals('dan-baker', StringHelper::slugify('Dan @ Baker!'));
        $this->assertEquals('custom_separator', StringHelper::slugify('Custom Separator', '_'));
        $this->assertEquals('cafe-au-lait', StringHelper::slugify('Café au lait'));
    }

    /** @test */
    public function mask_strings()
    {
        $this->assertEquals('Da****er', StringHelper::maskString('DanBaker', 2, 2));
        $this->assertEquals('***********', StringHelper::maskString('SuperSecret'));
        $this->assertEquals('D****r', StringHelper::maskString('Danier', 1, 1));
        $this->assertEquals('D@*******.com', StringHelper::maskString('D@private.com', 2, 4));
        $this->assertEquals('short', StringHelper::maskString('short', 2, 3)); // returns unchanged
    }

    /** @test */
    public function generate_random_strings()
    {
        $this->assertEquals(16, strlen(StringHelper::randomString()));
        $this->assertEquals(32, strlen(StringHelper::randomString(32)));
        $this->assertMatchesRegularExpression('/^[a-zA-Z0-9]{16}$/', StringHelper::randomString(16));
        $this->assertMatchesRegularExpression('/^[0-9]{10}$/', StringHelper::randomString(10, '0123456789'));
    }
}