<?php

namespace App\Service\PageCrawler;

interface PageCrawlerServiceInterface
{
    public function crawl(string $html): array;
}