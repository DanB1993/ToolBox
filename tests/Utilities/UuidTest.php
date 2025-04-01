<?php

namespace DanBaker\ToolBox\Tests\Utilities;

use DanBaker\ToolBox\ToolBox;
use PHPUnit\Framework\TestCase;

class UuidTest extends TestCase
{
    /** @test */
    public function generates_valid_uuid_v4()
    {
        $uuid = ToolBox::generateUuid()->v4();

        $this->assertMatchesRegularExpression(
            '/^[a-f0-9]{8}-[a-f0-9]{4}-4[a-f0-9]{3}-[89ab][a-f0-9]{3}-[a-f0-9]{12}$/',
            $uuid
        );
    }

    /** @test */
    public function generates_unique_uuids()
    {
        $uuid1 = ToolBox::generateUuid()->v4();
        $uuid2 = ToolBox::generateUuid()->v4();

        $this->assertNotEquals($uuid1, $uuid2);
    }
}