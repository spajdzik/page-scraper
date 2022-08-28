<?php

namespace App\Service\ScrapePage;

use App\Service\PageCrawler\PageCrawlerServiceInterface;
use App\Service\PageDownloader\PageDownloaderInterface;
use App\Service\Serializer\DTOSerializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;

class ScrapePageService implements ScrapePageServiceInterface
{
    public function __construct(
        private readonly string $pageScrapeUrl,
        private readonly PageDownloaderInterface $pageDownloader,
        private readonly PageCrawlerServiceInterface $pageCrawlerService,
        private readonly DTOSerializer $serializer
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

        return new JsonResponse($content, json: true);
    }
}