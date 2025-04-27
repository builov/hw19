<?php

namespace Builov\Hw19\Domain\Repository;

use Builov\Hw19\Domain\Entity\News;

interface NewsRepositoryInterface
{
    public function findAll(): iterable;

    public function findById(int $id): ?News;

    public function save(News $lead): void;

    public function delete(News $lead): void;
}