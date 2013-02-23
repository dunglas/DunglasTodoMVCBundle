<?php

namespace Dunglas\TodoMVCBundle\Tests\Functional;

use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase as BaseWebTestCase;

/**
 * Base Functional test case. Inspired (copied) from FOSCommentBundle
 * functional test suites.
 */
class WebTestCase extends BaseWebTestCase
{

    /**
     * @var \Doctrine\Common\Persistence\ObjectManager
     */
    protected $em;

    /**
     * @var boolean
     */
    protected static $schemaSetUp = false;

    /**
     * @var \Symfony\Bundle\FrameworkBundle\Client
     */
    protected $client;

    protected function setUp()
    {
        if (!class_exists('Twig_Environment')) {
            $this->markTestSkipped('Twig is not available.');
        }

        if (null === $this->em) {
            $this->em = $this->client->getContainer()->get('doctrine')->getEntityManager();

            if (!static::$schemaSetUp) {
                $st = new SchemaTool($this->em);

                $classes = $this->em->getMetadataFactory()->getAllMetadata();
                $st->dropSchema($classes);
                $st->createSchema($classes);

                static::$schemaSetUp = true;
            }
        }

        parent::setUp();
    }

}
