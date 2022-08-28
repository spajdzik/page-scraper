<?php

namespace App\Service\PageDownloader;

interface PageDownloaderInterface
{
    public function downloadPage(string $url): string;
}