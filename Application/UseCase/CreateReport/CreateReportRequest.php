<?php

namespace App\Application\UseCase\CreateReport;

class CreateReportRequest
{
    public function __construct(
        public readonly array $ids,
    )
    {
    }
}