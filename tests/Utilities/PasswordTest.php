<?php

namespace DanBaker\ToolBox\Tests\Utilities;

use DanBaker\ToolBox\Utilities\Password;
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    /** @test */
    public function generates_password_with_expected_length_and_characters()
    {
        $password = Password::generate(16);
        $this->assertEquals(16, strlen($password));
    }

    /** @test */
    public function generates_password_with_only_numbers()
    {
        $password = Password::generate(10, false, true, false, false);
        $this->assertMatchesRegularExpression('/^[0-9]{10}$/', $password);
    }

    /** @test */
    public function generates_password_with_only_lowercase()
    {
        $password = Password::generate(8, false, false, false, true);
        $this->assertMatchesRegularExpression('/^[a-z]{8}$/', $password);
    }

    /** @test */
    public function throws_exception_when_no_character_sets_are_selected()
    {
        $this->expectException(\InvalidArgumentException::class);
        Password::generate(10, false, false, false, false);
    }
}