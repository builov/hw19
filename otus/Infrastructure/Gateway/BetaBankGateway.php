<?php

declare(strict_types=1);

namespace App\Infrastructure\Gateway;

use App\Application\Gateway\BankGatewayInterface;
use App\Application\Gateway\BankGatewayRequest;
use App\Application\Gateway\BankGatewayResponse;

class BetaBankGateway implements BankGatewayInterface
{
    public function sendLead(BankGatewayRequest $request): BankGatewayResponse
    {
        sleep(2);
        $bankId = random_int(10_000, 99_999);
        if ($bankId % 10 <= 2) {
            throw new \Exception('Failed to send lead due to bank error');
        }
        return new BankGatewayResponse($bankId);
    }
}