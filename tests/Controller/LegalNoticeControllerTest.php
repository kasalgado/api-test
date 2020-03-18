<?php declare (strict_types=1);

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LegalNoticeControllerTest extends WebTestCase
{
    public function testCanGetResponseFromIndex()
    {
        $client = static::createClient();        
        $client->request('GET', '/de/legal-notice');
        
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
