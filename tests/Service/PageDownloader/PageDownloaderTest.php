<?php

namespace App\Tests\Service\PageDownloader;

use App\Service\PageDownloader\PageDownloaderInterface;
use App\Tests\ServiceTestCase;

class PageDownloaderTest extends ServiceTestCase
{
    public function test_download_page()
    {
        //Given
        $pageDownloader = $this->container->get(PageDownloaderInterface::class);
        $response = $pageDownloader->downloadPage(self::pageScrapeUrl);

        //When

        //Then
        $this->assertNotEmpty($response);
        $this->assertIsString($response);
    }
}