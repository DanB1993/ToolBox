<?php

namespace DanBaker\ToolBox\Tests\Clients;

use PHPUnit\Framework\TestCase;
use DanBaker\ToolBox\ToolBox;

class HttpClientTest extends TestCase
{
    /** @test */
    public function can_send_get_request_to_public_api()
    {
        $response = ToolBox::httpClient()->get('https://httpbin.org/get');

        $this->assertEquals(200, $response['status']);
        $this->assertArrayHasKey('json', $response);
        $this->assertIsArray($response['json']);
    }

    /** @test */
    public function can_send_post_request_with_data()
    {
        $response = ToolBox::httpClient()->post('https://httpbin.org/post', [
            'name' => 'Dan',
        ]);

        $this->assertEquals(200, $response['status']);
        $this->assertIsArray($response['json']);
        $this->assertEquals('Dan', $response['json']['form']['name'] ?? null);
    }

    /** @test */
    public function can_send_put_request_with_data()
    {
        $response = ToolBox::httpClient()->put('https://httpbin.org/put', [
            'framework' => 'ToolBox',
        ]);

        $this->assertEquals(200, $response['status']);
        $this->assertIsArray($response['json']);
        $this->assertEquals('ToolBox', $response['json']['form']['framework'] ?? null);
    }

    /** @test */
    public function can_send_delete_request()
    {
        $response = ToolBox::httpClient()->delete('https://httpbin.org/delete');

        $this->assertEquals(200, $response['status']);
        $this->assertIsArray($response['json']);
    }
}
