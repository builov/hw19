<?php

namespace App\Domain\Factory;

use App\Domain\Entity\News;
use App\Domain\ValueObject\NewsUrl;

interface NewsFactoryInterface
{
    public function create(string $url, string $title): News;
}