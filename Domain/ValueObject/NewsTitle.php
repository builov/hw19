<?php

namespace App\Domain\ValueObject;

class NewsTitle
{
    private string $value;

    public function __construct(string $value)
    {
        $value = htmlspecialchars($value, ENT_QUOTES);

        $this->assertValid($value);
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    private function assertValid(string $value): void
    {
        if (empty($value)) {
            throw new \InvalidArgumentException('Пустая строка.');
        }

        if (mb_strlen($value) > 255) {
            throw new \InvalidArgumentException('Слишком длинная строка.');
        }
    }
}
