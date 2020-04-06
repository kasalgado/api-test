<?php declare (strict_types=1);

namespace App\Tests\Lib;

use PHPUnit\Framework\TestCase;
use App\Service\ApiRequest;

class ApiRequestTest extends TestCase
{
    private $client;
    
    public function setUp()
    {
        $this->client = new ApiRequest();
    }
    
    public function testCanGetStatusOk()
    {
        $expected = 200;
        $this->assertEquals($expected, $this->client->getStatus());
    }
    
    public function testCanGetJsonHeader()
    {
        $expected = 'application/json; charset=utf-8';
        $headers = $this->client->getHeaders();
        
        $this->assertEquals($expected, $headers['content-type'][0]);
    }
    
    public function testCanCheckBodyIsObject()
    {
        $this->assertTrue(is_string($this->client->getBody()));
    }
}
