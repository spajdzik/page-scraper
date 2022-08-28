<?php

namespace App\Service\PageCrawler;

interface PageCrawlerInterface
{
    public function crawl(string $html): array;
}