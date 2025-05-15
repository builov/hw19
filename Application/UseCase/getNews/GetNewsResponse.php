<?php

namespace App\Application\UseCase\getNews;

class GetNewsResponse
{
    public function __construct(
        public readonly iterable $news,
    )
    {
    }
}