<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Phone;

class Lead
{
    private ?int $id = null;

    public function __construct(
        private Name  $name,
        private Phone $phone
    )
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getPhone(): Phone
    {
        return $this->phone;
    }
}
