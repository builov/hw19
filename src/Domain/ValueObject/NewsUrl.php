<?php

namespace Builov\Hw19\Domain\ValueObject;

class NewsUrl
{
    private string $value;

    public function __construct(string $url)
    {
        $this->assertExists($url);
        $this->value = $url;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    private function assertExists(string $url): void
    {
        $url = filter_var($url, FILTER_SANITIZE_URL); //'https://xn--80avpdf4e.xn--p1ai/'

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException('Некорректный url');
        }

        $headers = get_headers($url);

        if (!strpos($headers[0], '200')) {
            throw new \InvalidArgumentException('Страница не существует или недоступна.');
        }
    }
}