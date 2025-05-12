<?php

namespace App\Application\UseCase\CreateNews;

use App\Application\Source\SourceResponse;

class CreateNewsRequest
{
    public function __construct(
        public string $url,
        public string $title,
    )
    {
    }
}
