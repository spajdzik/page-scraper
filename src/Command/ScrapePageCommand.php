<?php

namespace App\Command;

use App\Service\ScrapePage\ScrapePageInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:scrape-page',
    description: 'This command allows you to scrape page',
    hidden: false
)]
class ScrapePageCommand extends Command
{
    public function __construct(private readonly ScrapePageInterface $scrapePageService, string $name = null)
    {
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $result = $this->scrapePageService->scrape();

        $output->write($result);

        if (empty($result)) {
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}