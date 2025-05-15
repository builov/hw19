<?php

namespace App\Application\UseCase\CreateReport;

class CreateReportResponse
{
    public function __construct(
        public readonly string $link,
    )
    {
    }
}