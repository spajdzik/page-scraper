<?php

namespace App\Service\ScrapePage;

use Symfony\Component\HttpFoundation\JsonResponse;

interface ScrapePageInterface
{
    public function scrape(): JsonResponse;
}