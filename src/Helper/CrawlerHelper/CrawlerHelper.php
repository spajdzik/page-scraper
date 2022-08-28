<?php

namespace App\Helper\CrawlerHelper;

use App\Entity\Package;
use Symfony\Component\DomCrawler\Crawler;

class CrawlerHelper
{
    private const PACKAGE_SELECTOR = '.package';
    private const TITLE_SELECTOR = 'h3';
    private const DESCRIPTION_SELECTOR = '.package-description';
    private const PRICE_SELECTOR = '.package-price .price-big';
    private const DISCOUNT_SELECTOR = '.package-price p';

    public function getPackages(Crawler $crawler): array
    {
        return $crawler->filter(self::PACKAGE_SELECTOR)->each(function (Crawler $node) {
            return $node;
        });
    }

    public function parsePackages(array $packages): array
    {
        $parsedPackages = [];
        foreach ($packages as $package) {
            $parsedPackages[] = $this->parsePackage($package);
        }
        return $parsedPackages;
    }

    private function parsePackage(Crawler $package): Package
    {
        $parsedPackage = new Package();
        $parsedPackage->setTitle($this->parseField($package, self::TITLE_SELECTOR));
        $parsedPackage->setDescription($this->parseField($package, self::DESCRIPTION_SELECTOR));
        $parsedPackage->setPrice($this->parseField($package, self::PRICE_SELECTOR));
        $parsedPackage->setDiscount($this->parseField($package, self::DISCOUNT_SELECTOR));

        return $parsedPackage;
    }

    private function parseField(Crawler $package, string $selector): string
    {
        $nodes = $package->filter($selector)->each(function (Crawler $node) {
            return $node->html();
        });

        return !empty($nodes) ? $nodes[0] : '';
    }
}