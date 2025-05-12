<?php

namespace App\Domain\Repository;

use App\Domain\Entity\News;

interface NewsRepositoryInterface
{
    public function findAll(): iterable;

    public function findById(int $id): ?News;

    public function save(News $news): void;

    public function delete(News $news): void;
}
