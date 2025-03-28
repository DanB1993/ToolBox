<?php

namespace DanBaker\ToolBox\Tests\Helpers;

use DanBaker\ToolBox\Helpers\ValidationHelper;
use PHPUnit\Framework\TestCase;

class ValidationHelperTest extends TestCase
{
    /** @test */
    public function correctly_validates_alphanumeric_strings()
    {
        $this->assertTrue(ValidationHelper::isAlphaNumeric('abc123'));
        $this->assertTrue(ValidationHelper::isAlphaNumeric('ABCDEF'));
        $this->assertTrue(ValidationHelper::isAlphaNumeric('9876543210'));

        $this->assertFalse(ValidationHelper::isAlphaNumeric('abc 123'));
        $this->assertFalse(ValidationHelper::isAlphaNumeric('hello_world'));
        $this->assertFalse(ValidationHelper::isAlphaNumeric('!@#$%^'));
        $this->assertFalse(ValidationHelper::isAlphaNumeric(''));
    }

    /** @test */
    public function correctly_validates_json_strings()
    {
        $this->assertTrue(ValidationHelper::isJson('{"name":"Dan"}'));
        $this->assertTrue(ValidationHelper::isJson('[1, 2, 3]'));
        $this->assertTrue(ValidationHelper::isJson('true'));
        $this->assertTrue(ValidationHelper::isJson('null'));

        $this->assertFalse(ValidationHelper::isJson(''));
        $this->assertFalse(ValidationHelper::isJson('{name:Dan}'));
        $this->assertFalse(ValidationHelper::isJson('Just a normal string'));
    }
}