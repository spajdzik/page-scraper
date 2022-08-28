<?php

namespace App\Service\ScrapePage;

use App\Service\PageCrawler\PageCrawlerInterface;
use App\Service\PageDownloader\PageDownloaderInterface;
use App\Service\Serializer\DTOSerializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;

class ScrapePage implements ScrapePageInterface
{
    public function __construct(
        private readonly string                  $pageScrapeUrl,
        private readonly PageDownloaderInterface $pageDownloader,
        private readonly PageCrawlerInterface    $pageCrawlerService,
        private readonly DTOSerializer           $serializer
    ) { }

    /**
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function scrape(): JsonResponse
    {
        $pageHtml = $this->pageDownloader->downloadPage($this->pageScrapeUrl);

        $packages = $this->pageCrawlerService->crawl($pageHtml);

        $content = $this->serializer->serialize($packages);

        return new JsonResponse(data: $content, json: true);
    }
}