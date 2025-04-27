<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Entity\Lead;
use App\Domain\Repository\LeadRepositoryInterface;

class FileLeadRepository implements LeadRepositoryInterface
{

    public function findAll(): iterable
    {
        // TODO: Implement findAll() method.
        return [];
    }

    public function findById(int $id): ?Lead
    {
        // TODO: Implement findById() method.
        return null;
    }

    public function save(Lead $lead): void
    {
        // Имитация сохранения в БД с присваиванием ID
        $reflectionProperty = new \ReflectionProperty(Lead::class, 'id');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($lead, 1);
    }

    public function delete(Lead $lead): void
    {
        // TODO: Implement delete() method.
    }
}