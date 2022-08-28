<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ServiceTestCase extends WebTestCase
{
    protected ContainerInterface $container;

    protected const pageScrapeUrl = 'https://wltest.dns-systems.net/';

    protected function setUp(): void
    {
        parent::setUp();

        $this->container = static::createClient()->getContainer();
    }
}