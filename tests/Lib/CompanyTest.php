<?php declare (strict_types=1);

namespace App\Tests\Lib;

use PHPUnit\Framework\TestCase;
use App\Lib\Company;

class CompanyTest extends TestCase
{
    public function testCanCreateCompany()
    {
        $name = 'Romaguera-Crona';
        $catchPhrase = 'Multi-layered client-server neural-net';
        $bs = 'harness real-time e-markets';
        $company = Company::create($name, $catchPhrase, $bs);
        
        $this->assertEquals($name, $company->getName());
        $this->assertEquals($catchPhrase, $company->getCatchPhrase());
        $this->assertEquals($bs, $company->getBs());
    }
}
