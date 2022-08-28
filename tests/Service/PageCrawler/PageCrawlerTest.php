<?php

namespace App\Tests\Service\PageCrawler;

use App\Entity\Package;
use App\Service\PageCrawler\PageCrawlerInterface;
use App\Service\PageDownloader\PageDownloaderInterface;
use App\Tests\ServiceTestCase;

class PageCrawlerTest extends ServiceTestCase
{
    public function test_crawl()
    {
        //Given
        $pageDownloader = $this->container->get(PageDownloaderInterface::class);
        $response = $pageDownloader->downloadPage(self::pageScrapeUrl);
        $pageCrawler = $this->container->get(PageCrawlerInterface::class);

        //When
        $packages = $pageCrawler->crawl($response);

        //Then
        $this->assertNotEmpty($packages);
        $this->assertIsArray($packages);
        $this->assertCount(6, $packages);

        /** @var Package $package */
        $package = $packages[0];
        $this->assertIsString($package->getTitle());
        $this->assertIsString($package->getDescription());
        $this->assertIsString($package->getPrice());
        $this->assertIsString($package->getDiscount());
    }
}