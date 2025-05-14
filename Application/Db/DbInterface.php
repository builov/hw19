<?php

namespace App\Application\Db;

interface DbInterface
{
    public function insertNews(InsertNewsRequest $insertNewsRequest): InsertResponse;
}