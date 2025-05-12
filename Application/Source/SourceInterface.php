<?php

namespace App\Application\Source;

use App\Application\UseCase\CreateNews\CreateNewsRequest;

interface SourceInterface
{
    public function create(SourceRequest $request): CreateNewsRequest;
}