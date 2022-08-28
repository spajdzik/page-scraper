<?php

namespace App\Service\PageCrawler;

use App\Helper\CrawlerHelper\CrawlerHelper;
use Symfony\Component\DomCrawler\Crawler;

class PageCrawlerService implements PageCrawlerServiceInterface
{
    public function crawl(string $html): array
    {
        $crawler = new Crawler($html);

        $crawlerHelper = new CrawlerHelper();
        $packages = $crawlerHelper->getPackages($crawler);

        return $crawlerHelper->parsePackages($packages);
    }
}