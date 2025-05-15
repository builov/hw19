<?php

namespace App\Application\Db;

interface DbInterface
{
    public function insertNews(InsertNewsRequest $insertNewsRequest): InsertResponse;

    public function selectAllNews(): SelectNewsResponse;

    public function selectNewsById(array $ids): SelectNewsResponse;
}