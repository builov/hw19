<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\News;
use App\Domain\Repository\NewsRepositoryInterface;

class CommonNewsRepository implements NewsRepositoryInterface
{
    public function findAll(): iterable
    {

    }

    public function findById(int $id): ?News
    {

    }

    public function save(News $news): void
    {
        // Имитация сохранения в БД с присваиванием ID
        $reflectionProperty = new \ReflectionProperty(News::class, 'id');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($news, 333);
    }

    public function delete(News $news): void
    {

    }
}