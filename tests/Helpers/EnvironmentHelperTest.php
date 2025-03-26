<?php

namespace DanBaker\ToolBox\Tests\Helpers;

use DanBaker\ToolBox\Helpers\EnvironmentHelper;
use PHPUnit\Framework\TestCase;

class EnvironmentHelperTest extends TestCase
{
    /** @test */
    public function detects_testing_environment_correctly()
    {
        putenv('APP_ENV=testing');
        $this->assertTrue(EnvironmentHelper::isTesting());

        putenv('APP_ENV=production');
        $this->assertFalse(EnvironmentHelper::isTesting());

        putenv('APP_ENV'); // reset
    }
}