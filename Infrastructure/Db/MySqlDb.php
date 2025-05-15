<?php

namespace App\Infrastructure\Db;

use App\Application\Db\DbInterface;
use App\Application\Db\InsertNewsRequest;
use App\Application\Db\InsertResponse;
use App\Application\Db\SelectNewsResponse;
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
        
    }
    
    public function selectAllNews(): SelectNewsResponse
    {
    
    }

    public function selectNewsById(array $ids): SelectNewsResponse
    {
    
    }
}
