<?php

declare(strict_types=1);

namespace App\Infrastructure\Http;

use App\Application\UseCase\SubmitLead\SubmitLeadUseCase;
use App\Application\UseCase\SubmitLead\SubmitLeadRequest;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class SubmitLeadController extends AbstractFOSRestController
{
    public function __construct(
        private SubmitLeadUseCase $useCase,
    )
    {
    }

    /**
     * @Rest\Post("/api/v1/leads")
     * @ParamConverter("request", converter="fos_rest.request_body")
     * @param SubmitLeadRequest $request
     * @return Response
     */
    public function __invoke(SubmitLeadRequest $request): Response
    {
        try {
            $response = ($this->useCase)($request);
            $view = $this->view($response, 201);
        } catch (\Throwable $e) {
            // todo В реальности используются более сложные обработчики ошибок
            $errorResponse = [
                'message' => $e->getMessage()
            ];
            $view = $this->view($errorResponse, 400);
        }
        return $this->handleView($view);
    }
}