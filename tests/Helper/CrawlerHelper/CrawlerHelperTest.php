<?php

namespace App\Tests\Helper\CrawlerHelper;

use App\Helper\CrawlerHelper\CrawlerHelper;
use App\Service\PageDownloader\PageDownloaderInterface;
use App\Tests\ServiceTestCase;
use Symfony\Component\DomCrawler\Crawler;

class CrawlerHelperTest extends ServiceTestCase
{
    public function test_get_packages()
    {
        //Given
        $packages = $this->getPackages();

        //Then
        $this->assertNotEmpty($packages);
        $this->assertIsArray($packages);
        $this->assertCount(6, $packages);
    }

    public function test_parse_packages()
    {
        //Given
        $crawlerHelper = new CrawlerHelper();
        $packages = $this->getPackages();

        //When
        $crawlerHelper->parsePackages($packages);

        //Then
        $this->assertNotEmpty($packages);
        $this->assertIsArray($packages);
        $this->assertCount(6, $packages);
    }

    private function getPackages(): array
    {
        //Given
        $pageDownloader = $this->container->get(PageDownloaderInterface::class);
        $html = $pageDownloader->downloadPage(self::pageScrapeUrl);

        //When
        $crawler = new Crawler($html);
        $crawlerHelper = new CrawlerHelper();

        return $crawlerHelper->getPackages($crawler);
    }
}