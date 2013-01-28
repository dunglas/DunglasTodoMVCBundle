<?php

namespace Dunglas\TodoMVCBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Tests the default controller
 * 
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class DefaultControllerTest extends WebTestCase
{

    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("TodoMVC")')->count() > 0);
    }

}