<?php

namespace DanBaker\ToolBox\Tests\Utility;

use DanBaker\ToolBox\ToolBox;
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    /** @test */
    public function generates_password_with_expected_length_and_characters()
    {
        $password = ToolBox::utility()->generatePassword(16);
        $this->assertEquals(16, strlen($password));
    }

    /** @test */
    public function generates_password_with_only_numbers()
    {
        $password = ToolBox::utility()->generatePassword(10, false, true, false, false);
        $this->assertMatchesRegularExpression('/^[0-9]{10}$/', $password);
    }

    /** @test */
    public function generates_password_with_only_lowercase()
    {
        $password = ToolBox::utility()->generatePassword(8, false, false, false, true);
        $this->assertMatchesRegularExpression('/^[a-z]{8}$/', $password);
    }

    /** @test */
    public function throws_exception_when_no_character_sets_are_selected()
    {
        $this->expectException(\InvalidArgumentException::class);
        ToolBox::utility()->generatePassword(10, false, false, false, false);
    }
}