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
}