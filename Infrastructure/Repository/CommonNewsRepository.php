<?php

namespace App\Infrastructure\Repository;

use App\Application\Db\DbInterface;
use App\Application\Db\InsertNewsRequest;
use App\Domain\Entity\News;
use App\Domain\Repository\NewsRepositoryInterface;

class CommonNewsRepository implements NewsRepositoryInterface
{
    public function __construct(
        private DbInterface $db,
    )
    {
    }

    public function findAll(): iterable
    {
        return $this->db->selectAllNews()->news;
    }

    public function findById(array $ids): iterable
    {
        return $this->db->selectNewsById($ids)->news;
    }

    public function save(News $news): void
    {
        $insertResponse = $this->db->insertNews(new InsertNewsRequest($news));

        $reflectionProperty = new \ReflectionProperty(News::class, 'id');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($news, $insertResponse->id);
    }

    public function delete(News $news): void
    {

    }
}
