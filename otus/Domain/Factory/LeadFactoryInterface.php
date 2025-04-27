<?php

declare(strict_types=1);

namespace App\Domain\Factory;

use App\Domain\Entity\Lead;

interface LeadFactoryInterface
{
    public function create(string $name, string $phone): Lead;
}