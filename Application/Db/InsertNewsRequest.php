<?php

namespace App\Application\Db;

use App\Domain\Entity\News;

class InsertNewsRequest
{
    public function __construct(
        public News $news,
    )
    {
        $this->title = $this->news->getTitle()->getValue();
        $this->url = $this->news->getUrl()->getValue();
        $this->created = $this->news->getDate()->format('Y-m-d');
    }
}