<?php

declare(strict_types=1);

namespace App\Infrastructure\Factory;

use App\Domain\Entity\Lead;
use App\Domain\Factory\LeadFactoryInterface;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Phone;

class CommonLeadFactory implements LeadFactoryInterface
{

    public function create(string $name, string $phone): Lead
    {
        return new Lead(
            new Name($name),
            new Phone($phone),
        );
    }
}