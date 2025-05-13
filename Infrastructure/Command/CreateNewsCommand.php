<?php

declare(strict_types=1);

namespace App\Infrastructure\Command;

use App\Application\Source\SourceInterface;
use App\Application\Source\SourceRequest;
use App\Application\UseCase\CreateNews\CreateNewsUseCase;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:create-news')]
class CreateNewsCommand extends Command
{
    public function __construct(
        private CreateNewsUseCase $useCase,
        private SourceInterface $source,
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('url', InputArgument::REQUIRED, 'Url');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $sourceRequest = new SourceRequest(
                $input->getArgument('url')
            );

            $createNewsRequest = $this->source->create($sourceRequest);

            $createNewsResponse = ($this->useCase)($createNewsRequest);

            $output->writeln('Новость №: ' . $createNewsResponse->id);
            return Command::SUCCESS;
        } catch (\Throwable $e) {
            $output->writeln($e->getMessage());
            return Command::FAILURE;
        }
    }
}
