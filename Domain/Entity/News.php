<?php

namespace App\Domain\Entity;

use App\Domain\ValueObject\NewsTitle;
use App\Domain\ValueObject\NewsUrl;

class News
{
    private ?int $id = null;

    public function __construct(
        private NewsUrl  $url,
        private NewsTitle $title
    )
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): NewsUrl
    {
        return $this->url;
    }

    public function getTitle(): NewsTitle
    {
        return $this->title;
    }
}
