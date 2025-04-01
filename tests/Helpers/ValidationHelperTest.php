<?php

namespace DanBaker\ToolBox\Tests\Helpers;

use DanBaker\ToolBox\ToolBox;
use PHPUnit\Framework\TestCase;

class ValidationHelperTest extends TestCase
{
    /** @test */
    public function correctly_validates_alphanumeric_strings()
    {
        $this->assertTrue(ToolBox::validate()->isAlphaNumeric('abc123'));
        $this->assertTrue(ToolBox::validate()->isAlphaNumeric('ABCDEF'));
        $this->assertTrue(ToolBox::validate()->isAlphaNumeric('9876543210'));

        $this->assertFalse(ToolBox::validate()->isAlphaNumeric('abc 123'));
        $this->assertFalse(ToolBox::validate()->isAlphaNumeric('hello_world'));
        $this->assertFalse(ToolBox::validate()->isAlphaNumeric('!@#$%^'));
        $this->assertFalse(ToolBox::validate()->isAlphaNumeric(''));
    }

    /** @test */
    public function correctly_validates_json_strings()
    {
        $this->assertTrue(ToolBox::validate()->isJson('{"name":"Dan"}'));
        $this->assertTrue(ToolBox::validate()->isJson('[1, 2, 3]'));
        $this->assertTrue(ToolBox::validate()->isJson('true'));
        $this->assertTrue(ToolBox::validate()->isJson('null'));

        $this->assertFalse(ToolBox::validate()->isJson(''));
        $this->assertFalse(ToolBox::validate()->isJson('{name:Dan}'));
        $this->assertFalse(ToolBox::validate()->isJson('Just a normal string'));
    }
}