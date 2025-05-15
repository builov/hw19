<?php

namespace App\Application\UseCase\CreateReport;

use App\Application\Report\ReportInterface;
use App\Application\UseCase\getNews\GetNewsRequest;
use App\Application\UseCase\getNews\GetNewsResponse;
use App\Domain\Repository\NewsRepositoryInterface;

class CreateReportUseCase
{
    public function __construct(
        private readonly NewsRepositoryInterface $newsRepository,
        private readonly ReportInterface $report,
    )
    {
    }

    public function __invoke(CreateReportRequest $request): CreateReportResponse
    {
        // получение массива новостей
        $news = $this->newsRepository->findById($request->ids);

        // формирование отчета
        $reportLink = $this->report->create($news);

        return new CreateReportResponse($reportLink);
    }
}