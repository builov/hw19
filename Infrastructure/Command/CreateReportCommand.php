<?php

namespace App\Infrastructure\Command;

use App\Application\Report\ReportInterface;
use App\Application\UseCase\CreateReport\CreateReportRequest;
use App\Application\UseCase\CreateReport\CreateReportUseCase;
use App\Application\UseCase\getNews\GetNewsByIdUseCase;
use App\Application\UseCase\getNews\GetNewsRequest;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:create-report')]
class CreateReportCommand extends Command
{
    public function __construct(
        private CreateReportUseCase $useCase,
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('ids', InputArgument::IS_ARRAY, 'Ids, разделите пробелом');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $createReportRequest = new CreateReportRequest(
                $input->getArgument('ids'),
            );

            $report = ($this->useCase)($createReportRequest);

            $output->writeln($report->link);
            return Command::SUCCESS;
        } catch (\Throwable $e) {
            $output->writeln($e->getMessage());
            return Command::FAILURE;
        }
    }
}