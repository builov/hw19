<?php

namespace App\Application\UseCase\CreateNews;

class CreateNewsResponse
{
    public function __construct(
        public readonly int $id
    )
    {
    }
}
