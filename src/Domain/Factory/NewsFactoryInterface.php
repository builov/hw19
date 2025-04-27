<?php

namespace Builov\Hw19\Domain\Factory;

use Builov\Hw19\Domain\Entity\News;

interface NewsFactoryInterface
{
    public function create(string $newsUrl, string $newsTitle): News;
}