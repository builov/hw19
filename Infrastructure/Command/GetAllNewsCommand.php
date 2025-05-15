<?php

declare(strict_types=1);

namespace App\Infrastructure\Command;

use App\Application\Source\SourceRequest;
use App\Application\UseCase\getNews\GetAllNewsUseCase;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:all-news')]
class GetAllNewsCommand extends Command
{
    public function __construct(
        private GetAllNewsUseCase $useCase,
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $response = ($this->useCase)();

            $output->writeln(print_r($response, true));
            return Command::SUCCESS;
        } catch (\Throwable $e) {
            $output->writeln($e->getMessage());
            return Command::FAILURE;
        }
    }
}