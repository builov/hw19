<?php

namespace App\Infrastructure\Factory;

use App\Domain\Entity\News;
use App\Domain\Factory\NewsFactoryInterface;
use App\Domain\ValueObject\NewsTitle;
use App\Domain\ValueObject\NewsUrl;
use DateTimeZone;

class CommonNewsFactory implements NewsFactoryInterface
{
    public function create(string $url, string $title): News
    {
        return new News(
            new NewsUrl($url),
            new NewsTitle($title),
            new \DateTime('now', new DateTimeZone('Europe/Moscow'))
        );
    }
}