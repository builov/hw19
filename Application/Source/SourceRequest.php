<?php

namespace App\Application\Source;

class SourceRequest
{
    public function __construct(
        public readonly string $url,
    )
    {
    }
}