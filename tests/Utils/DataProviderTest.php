<?php declare (strict_types=1);

namespace App\Tests\Utils;

use PHPUnit\Framework\TestCase;
use App\Utils\DataProvider;
use App\Tests\Data\JsonData;

class DataProviderTest extends TestCase
{
    public function testCanConvertDataToArray()
    {
        $provider = DataProvider::createFromJson(JsonData::getCorrect());
        $this->assertIsArray($provider->asArray());
    }
    
    public function testCanThrowExceptionByWrongData()
    {
        $provider = DataProvider::createFromJson(JsonData::getBroken());
        $this->expectException('TypeError');
        $provider->asArray();
    }
    
    public function testCanFetchValueFromData()
    {
        $expectedName = 'Leanne Graham';
        $expectedStreet = 'Kulas Light';
        $provider = DataProvider::createFromJson(JsonData::getCorrect());
        $data = $provider->asArray();
        
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
        $provider = DataProvider::createFromJson(JsonData::getCorrect());
        
        $this->assertEquals($expected, $provider->getMainData(0));
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
        $provider = DataProvider::createFromJson(JsonData::getCorrect());
        
        $this->assertEquals($expected, $provider->getAddressData(0));
    }
}
