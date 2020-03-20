<?php declare (strict_types=1);

namespace App\Tests\Utils;

use PHPUnit\Framework\TestCase;
use App\Utils\UserData;
use App\Utils\DataProvider;
use App\Tests\Data\JsonData;

class UserDataTest extends TestCase
{
    private $userData;
    
    public function setUp()
    {
        $provider = DataProvider::createFromJson(JsonData::getCorrect());
        $this->userData = UserData::createFromProvider($provider);
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
        
        $this->assertEquals($expected, $this->userData->provider()->getMainData(0));
    }
    
    public function testCanIterateUserData()
    {
        $expected = ['Leanne Graham', 'Ervin Howell'];
        
        foreach ($this->userData->provider()->asArray() as $index => $data) {
            $mainData = $this->userData->provider()->getMainData($index);
            $this->assertEquals($expected[$index], $mainData['name']);
        }
    }
    
    public function testCanGetDataFromUser()
    {
        $expectedName = 'Leanne Graham';
        $expectedEmail = 'Sincere@april.biz';
        $user = $this->userData->getUser(0);
        
        $this->assertEquals($expectedName, $user->getName());
        $this->assertEquals($expectedEmail, $user->getEmail());
    }
    
    public function testCanGetDataFromAddress()
    {
        $expectedStreet = 'Kulas Light';
        $expectedGeo = ['lat' => '-37.3159', 'lng' => '81.1496'];
        $address = $this->userData->getAddress(0);
        
        $this->assertEquals($expectedStreet, $address->getStreet());
        $this->assertEquals($expectedGeo, $address->getGeo());
    }
    
    public function testCanGetDataFromCompany()
    {
        $expectedName = 'Romaguera-Crona';
        $expectedBs = 'harness real-time e-markets';
        $company = $this->userData->getCompany(0);
        
        $this->assertEquals($expectedName, $company->getName());
        $this->assertEquals($expectedBs, $company->getBs());
    }
}
