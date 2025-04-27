<?php

namespace Builov\Hw19\Domain\Entity;

use Builov\Hw19\Domain\ValueObject\NewsTitle;
use Builov\Hw19\Domain\ValueObject\NewsUrl;

class RemoteResource
{
    private ?NewsTitle $title = null;

    public function __construct(
        private NewsUrl  $url
    )
    {
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