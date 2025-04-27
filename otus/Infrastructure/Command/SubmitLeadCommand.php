<?php

declare(strict_types=1);

namespace App\Infrastructure\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use App\Application\UseCase\SubmitLead\SubmitLeadUseCase;
use App\Application\UseCase\SubmitLead\SubmitLeadRequest;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:submit-lead')]
class SubmitLeadCommand extends Command
{
    public function __construct(
        private SubmitLeadUseCase $useCase,
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('name', InputArgument::REQUIRED, 'Name')
            ->addArgument('phone', InputArgument::REQUIRED, 'Phone');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $submitLeadRequest = new SubmitLeadRequest(
                $input->getArgument('name'),
                $input->getArgument('phone'),
            );
            $submitLeadResponse = ($this->useCase)($submitLeadRequest);
            $output->writeln('Lead ID: ' . $submitLeadResponse->id);
            $output->writeln('Bank ID: ' . $submitLeadResponse->bankId);
            return Command::SUCCESS;
        } catch (\Throwable $e) {
            $output->writeln($e->getMessage());
            return Command::FAILURE;
        }
    }
}
