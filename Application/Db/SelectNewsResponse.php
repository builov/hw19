<?php

namespace App\Application\Db;

class SelectNewsResponse
{
    public function __construct(
        public iterable $news,
    )
    {
    }
}