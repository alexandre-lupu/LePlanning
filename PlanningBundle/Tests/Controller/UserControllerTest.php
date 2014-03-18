<?php

namespace Iut\PlanningBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/add');
    }

    public function testId()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/show/id');
    }

}
