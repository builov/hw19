<?php

declare(strict_types=1);

namespace App\Application\UseCase\SubmitLead;

class SubmitLeadRequest
{
    public function __construct(
        public readonly string $name,
        public readonly string $phone,
    )
    {
    }
}