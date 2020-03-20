<?php declare (strict_types=1);

namespace App\Tests\Lib;

use PHPUnit\Framework\TestCase;
use App\Lib\User;

class UserTest extends TestCase
{
    public function testCanCreateUser()
    {
        $id = 1;
        $name = 'Leanne Graham';
        $username = 'Bret';
        $email = 'Sincere@april.biz';
        $phone = '1-770-736-8031 x56442';
        $website = 'hildegard.org';
        
        $user = User::create($id, $name, $username, $email, $phone, $website);
        
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($id, $user->getId());
        $this->assertEquals($name, $user->getName());
        $this->assertEquals($username, $user->getUsername());
        $this->assertEquals($email, $user->getEmail());
        $this->assertEquals($phone, $user->getPhone());
        $this->assertEquals($website, $user->getWebsite());
    }
}
