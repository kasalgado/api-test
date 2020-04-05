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
        $provider = new DataProvider();
        $this->userData = new UserData($provider);
        $this->userData->provider()->generate(JsonData::getCorrect());
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
        $this->userData->provider()->prepareData(0);
        
        $this->assertEquals($expected, $this->userData->provider()->getMainData());
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
}
