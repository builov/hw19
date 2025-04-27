<?php

declare(strict_types=1);

namespace App\Application\Gateway;

class BankGatewayResponse
{
    public function __construct(
        public readonly int $bankId,
    )
    {
    }
}