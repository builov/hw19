<?php

declare(strict_types=1);

namespace App\Application\UseCase\SubmitLead;

use App\Application\Gateway\BankGatewayInterface;
use App\Application\Gateway\BankGatewayRequest;
use App\Domain\Factory\LeadFactoryInterface;
use App\Domain\Repository\LeadRepositoryInterface;

class SubmitLeadUseCase
{
    public function __construct(
        private readonly LeadFactoryInterface    $leadFactory,
        private readonly LeadRepositoryInterface $leadRepository,
        private readonly BankGatewayInterface $bankGateway,
    )
    {
    }

    public function __invoke(SubmitLeadRequest $request): SubmitLeadResponse
    {
        // Создать лид
        $lead = $this->leadFactory->create($request->name, $request->phone);

        // Сохранить лид в базу
        $this->leadRepository->save($lead);

        // Отправить лид в банк
        $bankGatewayRequest = new BankGatewayRequest($request->name, $request->phone);
        $bankGatewayResponse = $this->bankGateway->sendLead($bankGatewayRequest);

        // Вернуть результат
        return new SubmitLeadResponse(
            $lead->getId(),
            $bankGatewayResponse->bankId,
        );
    }
}