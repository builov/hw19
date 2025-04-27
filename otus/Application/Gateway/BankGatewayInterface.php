<?php

declare(strict_types=1);

namespace App\Application\Gateway;

interface BankGatewayInterface
{
    public function sendLead(BankGatewayRequest $request): BankGatewayResponse;
}