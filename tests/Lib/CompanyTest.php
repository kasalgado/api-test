<?php declare (strict_types=1);

namespace App\Tests\Lib;

use PHPUnit\Framework\TestCase;
use App\Service\Company;

class CompanyTest extends TestCase
{
    public function testCanCreateCompany()
    {
        $name = 'Romaguera-Crona';
        $catchPhrase = 'Multi-layered client-server neural-net';
        $bs = 'harness real-time e-markets';
        $company = new Company($name, $catchPhrase, $bs);
        
        $this->assertEquals($name, $company->getName());
        $this->assertEquals($catchPhrase, $company->getCatchPhrase());
        $this->assertEquals($bs, $company->getBs());
    }
}
