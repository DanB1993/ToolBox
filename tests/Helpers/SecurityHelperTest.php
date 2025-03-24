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
}