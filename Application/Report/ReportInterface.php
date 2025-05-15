<?php

namespace App\Application\Report;

interface ReportInterface
{
    public function create(iterable $news): string;
}