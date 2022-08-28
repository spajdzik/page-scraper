<?php
namespace App\Service\PageDownloader;

use App\Service\Exception\Exception;
use App\Service\Exception\ExceptionData;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PageDownloader implements PageDownloaderInterface
{
    public function __construct(private readonly HttpClientInterface $client) { }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function downloadPage(string $url): string
    {
        $response = $this->client->request('GET', $url);

        $statusCode = $response->getStatusCode();
        if ($statusCode !== 200) {
            throw new Exception(new ExceptionData($statusCode, 'Problem with downloading the page'));
        }

        return $response->getContent();
    }
}