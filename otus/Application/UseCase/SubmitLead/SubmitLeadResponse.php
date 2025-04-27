<?php

declare(strict_types=1);

namespace App\Application\UseCase\SubmitLead;

readonly class SubmitLeadResponse
{
    public function __construct(
        public int $id,
        public int $bankId,
    )
    {
    }
}