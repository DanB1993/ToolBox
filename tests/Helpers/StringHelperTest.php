<?php

namespace DanBaker\ToolBox\Tests\Helpers;

use DanBaker\ToolBox\ToolBox;
use PHPUnit\Framework\TestCase;

class StringHelperTest extends TestCase
{
    /** @test */
    public function converts_camel_case_to_snake_case()
    {
        $this->assertEquals('my_variable_name', ToolBox::string()->toSnakeCase('myVariableName'));
    }

    /** @test */
    public function converts_pascal_case_to_snake_case()
    {
        $this->assertEquals('my_variable_name', ToolBox::string()->toSnakeCase('MyVariableName'));
    }

    /** @test */
    public function converts_spaces_to_snake_case()
    {
        $this->assertEquals('my_variable_name', ToolBox::string()->toSnakeCase('My Variable Name'));
    }

    /** @test */
    public function handles_mixed_strings()
    {
        $this->assertEquals('my_variable_123_name', ToolBox::string()->toSnakeCase('MyVariable123Name'));
        $this->assertEquals('hello_world', ToolBox::string()->toSnakeCase('hello-world'));
        $this->assertEquals('test_string', ToolBox::string()->toSnakeCase('test__string'));
    }

    /** @test */
    public function converts_snake_case_to_camel_case()
    {
        $this->assertEquals('myVariableName', ToolBox::string()->toCamelCase('my_variable_name'));
    }

    /** @test */
    public function converts_kebab_case_to_camel_case()
    {
        $this->assertEquals('myVariableName', ToolBox::string()->toCamelCase('my-variable-name'));
    }

    /** @test */
    public function converts_spaces_to_camel_case()
    {
        $this->assertEquals('myVariableName', ToolBox::string()->toCamelCase('my variable name'));
    }

    /** @test */
    public function handles_mixed_and_special_characters()
    {
        $this->assertEquals('helloWorld123', ToolBox::string()->toCamelCase('Hello World 123'));
        $this->assertEquals('testString', ToolBox::string()->toCamelCase('test__string'));
        $this->assertEquals('myVariable123Name', ToolBox::string()->toCamelCase('MyVariable_123-name'));
    }

    /** @test */
    public function converts_strings_to_kebab_case()
    {
        $this->assertEquals('my-variable-name', ToolBox::string()->toKebabCase('MyVariableName'));
        $this->assertEquals('hello-world', ToolBox::string()->toKebabCase('helloWorld'));
        $this->assertEquals('hello-world-123', ToolBox::string()->toKebabCase('Hello World 123'));
        $this->assertEquals('test-string', ToolBox::string()->toKebabCase('test__string'));
        $this->assertEquals('my-variable-123-name', ToolBox::string()->toKebabCase('MyVariable_123-name'));
    }

    /** @test */
    public function truncates_strings_properly()
    {
        $this->assertEquals('Hello...', ToolBox::string()->truncate('Hello World', 8));
        $this->assertEquals('Hello World', ToolBox::string()->truncate('Hello World', 20));
        $this->assertEquals('DanB...', ToolBox::string()->truncate('DanBakerToolBox', 7));
        $this->assertEquals('Dan!', ToolBox::string()->truncate('DanBaker', 4, '!'));
    }

    /** @test */
    public function pluralize_strings()
    {
        $this->assertEquals('cats', ToolBox::string()->pluralize('cat', 2));
        $this->assertEquals('box', ToolBox::string()->pluralize('box', 1));
        $this->assertEquals('boxes', ToolBox::string()->pluralize('box', 5));
        $this->assertEquals('babies', ToolBox::string()->pluralize('baby', 3));
        $this->assertEquals('toys', ToolBox::string()->pluralize('toy', 7));
    }

    /** @test */
    public function it_singularizes_basic_english_words()
    {
        $this->assertEquals('cat', ToolBox::string()->singularize('cats'));
        $this->assertEquals('box', ToolBox::string()->singularize('boxes'));
        $this->assertEquals('baby', ToolBox::string()->singularize('babies'));
        $this->assertEquals('church', ToolBox::string()->singularize('churches'));
        $this->assertEquals('status', ToolBox::string()->singularize('status')); // shouldn't change
    }
    
    /** @test */
    public function slugify_strings()
    {
        $this->assertEquals('hello-world', ToolBox::string()->slugify('Hello World'));
        $this->assertEquals('dan-baker', ToolBox::string()->slugify('Dan @ Baker!'));
        $this->assertEquals('custom_separator', ToolBox::string()->slugify('Custom Separator', '_'));
        $this->assertEquals('cafe-au-lait', ToolBox::string()->slugify('Café au lait'));
    }

    /** @test */
    public function mask_strings()
    {
        $this->assertEquals('Da****er', ToolBox::string()->maskString('DanBaker', 2, 2));
        $this->assertEquals('***********', ToolBox::string()->maskString('SuperSecret'));
        $this->assertEquals('D****r', ToolBox::string()->maskString('Danier', 1, 1));
        $this->assertEquals('D@*******.com', ToolBox::string()->maskString('D@private.com', 2, 4));
        $this->assertEquals('short', ToolBox::string()->maskString('short', 2, 3)); // returns unchanged
    }

    /** @test */
    public function generate_random_strings()
    {
        $this->assertEquals(16, strlen(ToolBox::string()->randomString()));
        $this->assertEquals(32, strlen(ToolBox::string()->randomString(32)));
        $this->assertMatchesRegularExpression('/^[a-zA-Z0-9]{16}$/', ToolBox::string()->randomString(16));
        $this->assertMatchesRegularExpression('/^[0-9]{10}$/', ToolBox::string()->randomString(10, '0123456789'));
    }
}