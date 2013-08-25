<?php

/*
 * This file is part of the DunglasTodoMVCBundle package.
 *
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dunglas\TodoMVCBundle\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Tests the default controller
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class DefaultControllerTest extends WebTestCase
{

    protected function setUp()
    {
        $this->client = static::createClient();

        parent::setUp();
    }

    public function testIndex()
    {
        $crawler = $this->client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("TodoMVC")')->count() > 0);
    }

}
