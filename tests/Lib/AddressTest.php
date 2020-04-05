<?php declare (strict_types=1);

namespace App\Tests\Lib;

use PHPUnit\Framework\TestCase;
use App\Service\Address;

class AddressTest extends TestCase
{
    public function testCanCreateAddress()
    {
        $street = 'Kulas Light';
        $suite = 'Apt. 556';
        $city = 'Gwenborough';
        $zipcode = '92998-3874';
        $geo = ['lat' => '-37.3159', 'lng' => '81.1496'];
        $address = new Address($street, $suite, $city, $zipcode, $geo);
        
        $this->assertInstanceOf(Address::class, $address);
        $this->assertEquals($street, $address->getStreet());
        $this->assertEquals($suite, $address->getSuite());
        $this->assertEquals($city, $address->getCity());
        $this->assertEquals($zipcode, $address->getZipcode());
        $this->assertEquals($geo, $address->getGeo());
    }
}
