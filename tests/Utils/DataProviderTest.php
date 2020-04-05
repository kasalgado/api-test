<?php declare (strict_types=1);

namespace App\Tests\Utils;

use PHPUnit\Framework\TestCase;
use App\Utils\DataProvider;
use App\Tests\Data\JsonData;

class DataProviderTest extends TestCase
{
    private $provider;
    
    public function setUp()
    {
        $this->provider = new DataProvider();
        $this->provider->generate(JsonData::getCorrect());
    }
    
    public function testCanConvertDataToArray()
    {
        $this->assertIsArray($this->provider->asArray());
    }
    
    public function testCanFetchValueFromData()
    {
        $expectedName = 'Leanne Graham';
        $expectedStreet = 'Kulas Light';
        $data = $this->provider->asArray();
        
        $this->assertEquals($expectedName, $data[0]['name']);
        $this->assertEquals($expectedStreet, $data[0]['address']['street']);
    }
    
    public function testCanGetMainData()
    {
        $expected = [
            'id' => 1,
            'name' => 'Leanne Graham',
            'username' => 'Bret',
            'email' => 'Sincere@april.biz',
            'phone' => '1-770-736-8031 x56442',
            'website' => 'hildegard.org',
        ];
        $data = $this->provider->prepareData(0);
        
        $this->assertEquals($expected, $this->provider->getMainData());
    }
    
    public function testCanGetAddressData()
    {
        $expected = [
            'street' => 'Kulas Light',
            'suite' => 'Apt. 556',
            'city' => 'Gwenborough',
            'zipcode' => '92998-3874',
            'geo' => [
                'lat' => '-37.3159',
                'lng' => '81.1496'
            ],
        ];
        $data = $this->provider->prepareData(0);
        
        $this->assertEquals($expected, $this->provider->getAddressData());
    }
    
    public function testCanThrowExceptionByWrongData()
    {
        $provider = new DataProvider();
        $provider->generate(JsonData::getBroken());
        $this->expectException('TypeError');
        $provider->asArray();
    }
}
