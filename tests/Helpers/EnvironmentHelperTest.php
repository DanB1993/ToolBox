<?php

namespace DanBaker\ToolBox\Tests\Helpers;

use DanBaker\ToolBox\ToolBox;
use PHPUnit\Framework\TestCase;

class EnvironmentHelperTest extends TestCase
{
    /** @test */
    public function returns_env_value_or_default()
    {
        putenv('TOOLBOX_EXAMPLE=true');
        $this->assertTrue(ToolBox::env()->getEnv('TOOLBOX_EXAMPLE'));

        putenv('TOOLBOX_EXAMPLE=(null)');
        $this->assertNull(ToolBox::env()->getEnv('TOOLBOX_EXAMPLE'));

        putenv('TOOLBOX_EXAMPLE=(empty)');
        $this->assertSame('', ToolBox::env()->getEnv('TOOLBOX_EXAMPLE'));

        putenv('TOOLBOX_MISSING'); // Unset
        $this->assertEquals('fallback', ToolBox::env()->getEnv('TOOLBOX_MISSING', 'fallback'));
    }

    /** @test */
    public function detects_testing_environment_correctly()
    {
        putenv('APP_ENV=testing');
        $this->assertTrue(ToolBox::env()->isTesting());

        putenv('APP_ENV=production');
        $this->assertFalse(ToolBox::env()->isTesting());

        putenv('APP_ENV'); // reset
    }
    
    /** @test */
    public function detects_development_environment_correctly()
    {
        putenv('APP_ENV=development');
        $this->assertTrue(ToolBox::env()->isDevelopment());

        putenv('APP_ENV=production');
        $this->assertFalse(ToolBox::env()->isDevelopment());

        putenv('APP_ENV'); // reset
    }

    /** @test */
    public function detects_production_environment_correctly()
    {
        putenv('APP_ENV=production');
        $this->assertTrue(ToolBox::env()->isProduction());

        putenv('APP_ENV=development');
        $this->assertFalse(ToolBox::env()->isProduction());

        putenv('APP_ENV'); // reset
    }
}