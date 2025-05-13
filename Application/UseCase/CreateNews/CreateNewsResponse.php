<?php

namespace App\Application\UseCase\CreateNews;

class CreateNewsResponse
{
    public function __construct(
        public readonly int $id,
        public readonly \DateTime $date,
    )
    {
    }
}

