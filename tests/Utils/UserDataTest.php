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
    
    public function testCanGetAllUsersData()
    {
        $expectedNameUser1 = 'Leanne Graham';
        $expectedNameUser2 = 'Ervin Howell';
        $expectedStreetUser1 = 'Kulas Light';
        $expectedStreetUser2 = 'Victor Plains';
        $expectedCompanyNameUser1 = 'Romaguera-Crona';
        $expectedCompanyNameUser2 = 'Deckow-Crist';
        $users = $this->userData->getUsers();
        
        $this->assertEquals($expectedNameUser1, $users[0]['user']->getName());
        $this->assertEquals($expectedNameUser2, $users[1]['user']->getName());
        $this->assertEquals($expectedStreetUser1, $users[0]['address']->getStreet());
        $this->assertEquals($expectedStreetUser2, $users[1]['address']->getStreet());
        $this->assertEquals($expectedCompanyNameUser1, $users[0]['company']->getName());
        $this->assertEquals($expectedCompanyNameUser2, $users[1]['company']->getName());
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
