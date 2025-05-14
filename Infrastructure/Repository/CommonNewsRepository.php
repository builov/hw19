<?php

namespace App\Infrastructure\Repository;

use App\Application\Db\DbInterface;
use App\Application\Db\InsertNewsRequest;
use App\Domain\Entity\News;
use App\Domain\Repository\NewsRepositoryInterface;
use App\Infrastructure\Db\MySqlDb;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;

class CommonNewsRepository implements NewsRepositoryInterface
{
    public function __construct(
        private DbInterface $db,
    )
    {
    }

    public function findAll(): iterable
    {

    }

    public function findById(int $id): ?News
    {

    }

    public function save(News $news): void
    {
//        $values = [
//            'title' => $news->getTitle()->getValue(),
//            'url' => $news->getUrl()->getValue(),
//            'created' => $news->getDate()->format('Y-m-d')
//        ];

        $insertResponse = $this->db->insertNews(new InsertNewsRequest($news));

        $reflectionProperty = new \ReflectionProperty(News::class, 'id');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($news, $insertResponse->id);
    }

    public function delete(News $news): void
    {

    }
}
