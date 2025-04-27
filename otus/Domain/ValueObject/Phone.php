<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

class Phone
{
    private string $value;

    public function __construct(string $value)
    {
        $this->assertValidPhone($value);
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    private function assertValidPhone(string $value): void
    {
        if (!preg_match('/^\d{10}$/', $value)) {
            throw new \InvalidArgumentException('Phone number must contain exactly 10 digits');
        }
    }
}
