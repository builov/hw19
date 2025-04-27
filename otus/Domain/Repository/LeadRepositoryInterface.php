<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Entity\Lead;

interface LeadRepositoryInterface
{
    /**
     * @return Lead[]
     */
    public function findAll(): iterable;

    public function findById(int $id): ?Lead;

    public function save(Lead $lead): void;

    public function delete(Lead $lead): void;
}
