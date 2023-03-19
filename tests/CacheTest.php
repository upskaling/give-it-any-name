<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CacheTest extends WebTestCase
{
    public function testCache()
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $client->request('GET', '/');
        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $xSymfonyCache = explode(
            ';',
            $client->getResponse()->headers->get('X-Symfony-Cache')
        );

        // test if the cache is working
        $this->assertContains(' GET /miss: fresh', $xSymfonyCache);
    }
}