<?php

namespace App\Service\ScrapePage;

use Symfony\Component\HttpFoundation\JsonResponse;

interface ScrapePageServiceInterface
{
    public function scrape(): JsonResponse;
}