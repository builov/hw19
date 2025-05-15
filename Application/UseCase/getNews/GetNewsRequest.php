<?php

namespace App\Application\UseCase\getNews;

class GetNewsRequest
{
    public function __construct(
        public readonly array $ids,
    )
    {
    }
}