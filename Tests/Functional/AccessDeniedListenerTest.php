<?php

/*
 * This file is part of the FOSRestBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\RestBundle\Tests\Functional;

/**
 * @group legacy
 */
class AccessDeniedListenerTest extends WebTestCase
{
    private static $client;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        static::$client = static::createClient(['test_case' => 'AccessDeniedListener']);
    }

    public static function tearDownAfterClass()
    {
        self::deleteTmpDir('AccessDeniedListener');
        parent::tearDownAfterClass();
    }

    public function testBundleListenerHandlesExceptionsInRestZones()
    {
        static::$client->request('GET', '/api/comments');

        $this->assertEquals(403, static::$client->getResponse()->getStatusCode());
        $this->assertEquals('application/json', static::$client->getResponse()->headers->get('Content-Type'));
    }

    public function testSymfonyListenerHandlesExceptionsOutsideRestZones()
    {
        static::$client->request('GET', '/admin/comments');

        $this->assertEquals(302, static::$client->getResponse()->getStatusCode());
        $this->assertEquals('text/html; charset=UTF-8', static::$client->getResponse()->headers->get('Content-Type'));
    }
}
