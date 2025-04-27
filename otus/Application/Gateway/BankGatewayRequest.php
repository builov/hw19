<?php

declare(strict_types=1);

namespace App\Application\Gateway;

class BankGatewayRequest
{
    public function __construct(
        public readonly string $name,
        public readonly string $phone,
    )
    {
    }
}