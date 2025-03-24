<?php

namespace DanBaker\ToolBox\Tests\Helpers;

use DanBaker\ToolBox\Helpers\SecurityHelper;
use PHPUnit\Framework\TestCase;

class SecurityHelperTest extends TestCase
{
    /** @test */
    public function generates_token_of_correct_length()
    {
        $token = SecurityHelper::generateToken(32);
        $this->assertEquals(32, strlen($token));

        $token64 = SecurityHelper::generateToken(64);
        $this->assertEquals(64, strlen($token64));
    }

    /** @test */
    public function tokens_are_unique()
    {
        $token1 = SecurityHelper::generateToken();
        $token2 = SecurityHelper::generateToken();

        $this->assertNotEquals($token1, $token2);
    }

    /** @test */
    public function verifies_password_correctly()
    {
        $password = 'SecurePassword123!';
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $this->assertTrue(SecurityHelper::verifyPassword($password, $hash));
        $this->assertFalse(SecurityHelper::verifyPassword('WrongPassword', $hash));
    }

    /** @test */
    public function hashes_password_correctly()
    {
        $password = 'SecurePassword123!';
        $hash = SecurityHelper::hashPassword($password);

        $this->assertIsString($hash);
        $this->assertTrue(password_verify($password, $hash));
    }

    /** @test */
    public function escapes_html_correctly()
    {
        $rawInput = '<script>alert("XSS")</script>';
        $escaped = SecurityHelper::escapeHtml($rawInput);

        $this->assertEquals('&lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;', $escaped);
    }

   /** @test */
    public function sanitizes_input_correctly()
    {
        $rawInput = '<script>alert("Attack!")</script><b>Hello</b>';
        $sanitized = SecurityHelper::sanitizeInput($rawInput);

        $this->assertEquals('alert(&#34;Attack!&#34;)Hello', $sanitized);
    }
}