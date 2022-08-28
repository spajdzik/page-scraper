<?php

namespace App\Tests\Service\ScrapePage;

use App\Service\ScrapePage\ScrapePageInterface;
use App\Tests\ServiceTestCase;

class ScrapePageTest extends ServiceTestCase
{
    public function test_scrape()
    {
        //Given
        $pageScraper = $this->container->get(ScrapePageInterface::class);

        //When
        $response = $pageScraper->scrape();

        //Then
        $this->assertNotEmpty($response);
        $this->assertJson($response->getContent());
    }
}