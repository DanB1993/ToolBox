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
    
    /** @test */
    public function detects_development_environment_correctly()
    {
        putenv('APP_ENV=development');
        $this->assertTrue(EnvironmentHelper::isDevelopment());

        putenv('APP_ENV=production');
        $this->assertFalse(EnvironmentHelper::isDevelopment());

        putenv('APP_ENV'); // reset
    }

    /** @test */
    public function detects_production_environment_correctly()
    {
        putenv('APP_ENV=production');
        $this->assertTrue(EnvironmentHelper::isProduction());

        putenv('APP_ENV=development');
        $this->assertFalse(EnvironmentHelper::isProduction());

        putenv('APP_ENV'); // reset
    }
}