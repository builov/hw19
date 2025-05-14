<?php

namespace App\Infrastructure\Db;

use App\Application\Db\DbInterface;
use App\Application\Db\InsertNewsRequest;
use App\Application\Db\InsertResponse;
use Doctrine\DBAL\Connection;

class MySqlDb implements DbInterface
{
    public function __construct(
        private Connection $connection,
    )
    {
    }

    public function insertNews(InsertNewsRequest $insertNewsRequest): InsertResponse
    {
        $sql = 'INSERT INTO news (title, url, created) VALUES (:title, :url, :created)';

        $values = [
            'title' => $insertNewsRequest->title,
            'url' => $insertNewsRequest->url,
            'created' => $insertNewsRequest->created
        ];

        $this->connection->executeQuery($sql, $values);

        return new InsertResponse($this->connection->lastInsertId());
    }
}