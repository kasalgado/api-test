<?php declare (strict_types=1);

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiLegalNoticeControllerTest extends WebTestCase
{
    public function testCanGetResponseFromIndex()
    {
        $client = static::createClient();        
        $client->request('GET', '/api/legal-notice');
        
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertTrue(
            $client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            ),
            'the "Content-Type" header is "application/json"'
        );
    }
}
