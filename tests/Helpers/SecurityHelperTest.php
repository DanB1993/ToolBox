<?php

namespace DanBaker\ToolBox\Tests\Helpers;

use DanBaker\ToolBox\ToolBox;
use PHPUnit\Framework\TestCase;

class SecurityHelperTest extends TestCase
{
    /** @test */
    public function generates_token_of_correct_length()
    {
        $token = ToolBox::security()->generateToken(32);
        $this->assertEquals(32, strlen($token));

        $token64 = ToolBox::security()->generateToken(64);
        $this->assertEquals(64, strlen($token64));
    }

    /** @test */
    public function tokens_are_unique()
    {
        $token1 = ToolBox::security()->generateToken();
        $token2 = ToolBox::security()->generateToken();

        $this->assertNotEquals($token1, $token2);
    }

    /** @test */
    public function verifies_password_correctly()
    {
        $password = 'SecurePassword123!';
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $this->assertTrue(ToolBox::security()->verifyPassword($password, $hash));
        $this->assertFalse(ToolBox::security()->verifyPassword('WrongPassword', $hash));
    }

    /** @test */
    public function hashes_password_correctly()
    {
        $password = 'SecurePassword123!';
        $hash = ToolBox::security()->hashPassword($password);

        $this->assertIsString($hash);
        $this->assertTrue(password_verify($password, $hash));
    }

    /** @test */
    public function escapes_html_correctly()
    {
        $rawInput = '<script>alert("XSS")</script>';
        $escaped = ToolBox::security()->escapeHtml($rawInput);

        $this->assertEquals('&lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;', $escaped);
    }

   /** @test */
    public function sanitizes_input_correctly()
    {
        $rawInput = '<script>alert("Attack!")</script><b>Hello</b>';
        $sanitized = ToolBox::security()->sanitizeInput($rawInput);

        $this->assertEquals('alert(&#34;Attack!&#34;)Hello', $sanitized);
    }

    /** @test */
    public function validates_uuid_correctly()
    {
        $this->assertTrue(ToolBox::security()->isUuid('3f29c4f6-8a13-4fbd-a27d-2d59b7e4c219')); // valid v4
        $this->assertTrue(ToolBox::security()->isUuid('550e8400-e29b-11d4-a716-446655440000')); // valid v1

        $this->assertFalse(ToolBox::security()->isUuid('not-a-uuid'));
        $this->assertFalse(ToolBox::security()->isUuid('12345678-1234-1234-1234-123456789'));   // too short
        $this->assertFalse(ToolBox::security()->isUuid('g2345678-1234-1234-1234-123456789abc')); // invalid char
    }

    /** @test */
    public function validates_ip_address_correctly()
    {
        // Valid IPv4
        $this->assertTrue(ToolBox::security()->isIpAddress('192.168.1.1'));

        // Valid IPv6
        $this->assertTrue(ToolBox::security()->isIpAddress('2001:0db8:85a3:0000:0000:8a2e:0370:7334'));

        // Invalid
        $this->assertFalse(ToolBox::security()->isIpAddress('999.999.999.999'));
        $this->assertFalse(ToolBox::security()->isIpAddress('not-an-ip'));
        $this->assertFalse(ToolBox::security()->isIpAddress('1234:5678:90ab:cdef:ghij:klmn:opqr:stuv'));
    }
}